<?php
declare(strict_types=1);

namespace Klamparski\T3apicontent\Serializer\Handler;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\Visitor\SerializationVisitorInterface;
use SourceBroker\T3api\Serializer\Handler\AbstractHandler;
use SourceBroker\T3api\Serializer\Handler\SerializeHandlerInterface;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

class DataProcessorHandler extends AbstractHandler implements SerializeHandlerInterface
{
    public const TYPE = 'DataProcessor';

    protected static $supportedTypes = [self::TYPE];

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @param ObjectManager $objectManager
     */
    public function injectObjectManager(ObjectManager $objectManager): void
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @inheritDoc
     */
    public function serialize(
        SerializationVisitorInterface $visitor,
        $value,
        array $type,
        SerializationContext $context
    ) {
        [$processorName, $configuration, $configurationExpression]
            = $this->getDecodedParams($type['params']);

        foreach ($configurationExpression as &$expression) {
            $expression = $this->evaluateExpression($expression, ['object' => $context->getObject()]);
        }
        unset($expression);

        /** @var DataProcessorInterface $processor */
        $processor = $this->objectManager->get($processorName);

        // @todo Check if data processor data shouldn't be more unique - some processors does not rely on similar configuration
        //     This solution works for `CommaSeparatedValueProcessor`, `SplitProcessor` and `FlexFormProcessor` but definitely
        //     may fails for others - not tested. Maybe it will be better to create separate handlers for every type
        $cObj = $this->getContentObjectRenderer();

        // @todo we pass fake value here. To make it work as in TYPO3 core whole database record should be passed to `start` method
        //     Think about fetching database record (using $context->getObject()->getUid()) and passing it instead of fake array
        $cObj->start(['value' => $value, 'data' => ['value' => $value]]);

        ['value' => $output] = $processor->process(
            $cObj,
            [],
            array_merge(
                $configuration ?? [],
                $configurationExpression ?? [],
                [
                    'fieldName' => 'value',
                    'as' => 'value'
                ]
            ),
            [
                'value' => $value,
                'data' => ['value' => $value]
            ]
        );

        return $output;
    }

    /**
     * @param string $expression
     * @param array $variables
     *
     * @return mixed
     */
    protected function evaluateExpression(string $expression, array $variables = [])
    {
        return $this->getExpressionLanguage()->evaluate($expression, $variables);
    }

    /**
     * @todo Probably(!) better would be to use TYPO3's expression language wrapper instead of pure symfony classes
     * @return ExpressionLanguage
     */
    protected function getExpressionLanguage(): ExpressionLanguage
    {
        static $expressionLanguage;

        if (!$expressionLanguage) {
            $expressionLanguage = new ExpressionLanguage();
            $expressionLanguage->addFunction(ExpressionFunction::fromPhp('chr'));
        }

        return $expressionLanguage;
    }

    /**
     * @return ContentObjectRenderer
     */
    protected function getContentObjectRenderer(): ContentObjectRenderer
    {
        static $contentObjectRenderer;

        if (!$contentObjectRenderer instanceof ContentObjectRenderer) {
            $contentObjectRenderer = GeneralUtility::makeInstance(ContentObjectRenderer::class);
        }

        return $contentObjectRenderer;
    }
}

<?php
declare(strict_types=1);

namespace Klamparski\T3apicontent\Serializer;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\Visitor\SerializationVisitorInterface;
use SourceBroker\T3api\Serializer\Handler\AbstractHandler;
use SourceBroker\T3api\Serializer\Handler\SerializeHandlerInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class RteHandler extends AbstractHandler implements SerializeHandlerInterface
{
    public const TYPE = 'Rte';

    protected static $supportedTypes = [self::TYPE];

    /**
     * @inheritDoc
     */
    public function serialize(
        SerializationVisitorInterface $visitor,
        $text,
        array $type,
        SerializationContext $context
    ) {
        return $this->getContentObjectRenderer()->parseFunc($text, [], '< lib.parseFunc_RTE');
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

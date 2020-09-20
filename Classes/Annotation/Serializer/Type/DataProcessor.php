<?php
declare(strict_types=1);

namespace Klamparski\T3apicontent\Annotation\Serializer\Type;

use InvalidArgumentException;
use SourceBroker\T3api\Annotation\Serializer\Type\TypeInterface;
use Klamparski\T3apicontent\Serializer\Handler\DataProcessorHandler;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 * @Annotation
 * @Target({"PROPERTY","METHOD"})
 */
class DataProcessor implements TypeInterface
{
    /**
     * @var string
     */
    protected $processorClass;

    /**
     * @var array
     */
    protected $configuration = [];

    /**
     * @var array
     */
    protected $configurationExpression = [];

    public function __construct($options = [])
    {
        if (!is_string($options['value'] ?? null)) {
            throw new InvalidArgumentException(
                sprintf('`%s` Annotation needs a value representing the processor class.',
                    self::class),
                1600496629797
            );
        }

        $processorClass = $options['value'];

        if (!is_a($processorClass, DataProcessorInterface::class, true)) {
            throw new InvalidArgumentException(
                sprintf(
                    'The processor class `%s` does not extends `%s`.%s',
                    $processorClass,
                    DataProcessorInterface::class,
                    substr_count($options['value'], '\\') < 2
                        ? ' Did you forget to use `use` statement?' : ''
                ),
                1600496701694
            );
        }

        $this->processorClass = $processorClass;
        $this->configuration = $options['configuration'] ?? $this->configuration;
        $this->configurationExpression = $options['configurationExpression'] ?? $this->configurationExpression;
    }

    public function getParams(): array
    {
        return [
            $this->processorClass,
            $this->configuration,
            $this->configurationExpression,
        ];
    }

    public function getName(): string
    {
        return DataProcessorHandler::TYPE;
    }
}

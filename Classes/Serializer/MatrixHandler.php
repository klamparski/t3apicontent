<?php

declare(strict_types=1);

namespace Klamparski\T3apicontent\Serializer;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\Visitor\SerializationVisitorInterface;
use SourceBroker\T3api\Serializer\Handler\AbstractHandler;
use SourceBroker\T3api\Serializer\Handler\SerializeHandlerInterface;

class MatrixHandler extends AbstractHandler implements SerializeHandlerInterface
{
    public const TYPE = 'Matrix';

    /**
     * @var string[]
     */
    protected static $supportedTypes = [self::TYPE];

    /**
     * @param SerializationVisitorInterface $visitor
     * @param string $content
     * @param array $type
     * @param SerializationContext $context
     * @return array
     */
    public function serialize(
        SerializationVisitorInterface $visitor,
        $content,
        array $type,
        SerializationContext $context
    ) {
    	return preg_split('/\n|\r\n?/', $content); // explode(PHP_EOL, $content) does not remove '\r'
    }
}

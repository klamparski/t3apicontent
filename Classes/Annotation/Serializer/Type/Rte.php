<?php

declare(strict_types=1);
namespace Klamparski\T3apicontent\Annotation\Serializer\Type;

use Klamparski\T3apicontent\Serializer\RteHandler;
use SourceBroker\T3api\Annotation\Serializer\Type\TypeInterface;

/**
 * @Annotation
 * @Target({"PROPERTY","METHOD"})
 */
class Rte implements TypeInterface
{
    /**
     * @return array
     */
    public function getParams(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return RteHandler::TYPE;
    }
}

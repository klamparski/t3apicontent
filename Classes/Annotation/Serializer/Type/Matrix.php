<?php

declare(strict_types=1);

namespace Klamparski\T3apicontent\Annotation\Serializer\Type;

use Klamparski\T3apicontent\Serializer\MatrixHandler;
use SourceBroker\T3api\Annotation\Serializer\Type\TypeInterface;

/**
 * @Annotation
 * @Target({"PROPERTY","METHOD"})
 */
class Matrix implements TypeInterface
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
        return MatrixHandler::TYPE;
    }
}

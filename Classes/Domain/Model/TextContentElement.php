<?php
declare(strict_types=1);

namespace Klamparski\T3apicontent\Domain\Model;

use Klamparski\T3apicontent\Annotation\Serializer\Type\Rte;

class TextContentElement extends ContentElement
{
    /**
     * @var string
     * @Rte()
     */
    protected $bodytext;

    public function getBodytext(): string
    {
        return $this->bodytext ?? '';
    }
}

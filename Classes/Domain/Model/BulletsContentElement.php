<?php
declare(strict_types=1);

namespace Klamparski\T3apicontent\Domain\Model;

use Klamparski\T3apicontent\Annotation\Serializer\Type\Matrix;

class BulletsContentElement extends TextContentElement
{
    /**
     * @var string
     * @Matrix()
     */
    protected $bodytext;

    /**
     * @var int
     */
    protected $bulletsType;
    
    public function getBulletsType(): int
    {
        return $this->bulletsType ?? 0;
    }
}

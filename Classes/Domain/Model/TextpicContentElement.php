<?php
declare(strict_types=1);

namespace Klamparski\T3apicontent\Domain\Model;

use SourceBroker\T3api\Annotation\Serializer\Type\Image;
use SourceBroker\T3api\Annotation\Serializer\VirtualProperty;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class TextpicContentElement extends TextContentElement
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Klamparski\T3apicontent\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $images;

    public function __construct()
    {
        $this->images = new ObjectStorage();
    }

    public function getImages(): ObjectStorage
    {
        return $this->images;
    }

    /**
     * @return ObjectStorage
     * @VirtualProperty()
     * @Image(maxHeight="200", maxWidth="200")
     */
    public function getImageThumbs(): ObjectStorage
    {
        return $this->images;
    }
}

<?php
declare(strict_types=1);

namespace Klamparski\T3apicontent\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class TextAndImagesContentElement extends TextContentElement
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
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
}

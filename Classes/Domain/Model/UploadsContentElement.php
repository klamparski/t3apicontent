<?php

declare(strict_types=1);

namespace Klamparski\T3apicontent\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class UploadsContentElement extends AbstractContentElement
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Klamparski\T3apicontent\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $media;

    public function __construct()
    {
        $this->media = new ObjectStorage();
    }

    public function getMedia(): ObjectStorage
    {
        return $this->media;
    }
}

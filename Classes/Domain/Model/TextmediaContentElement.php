<?php

declare(strict_types=1);

namespace Klamparski\T3apicontent\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class TextmediaContentElement extends TextContentElement
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Klamparski\T3apicontent\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $assets;

    public function __construct()
    {
        $this->assets = new ObjectStorage();
    }

    public function getAssets(): ObjectStorage
    {
        return $this->assets;
    }
}

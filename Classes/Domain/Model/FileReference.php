<?php

declare(strict_types=1);

namespace Klamparski\T3apicontent\Domain\Model;

use SourceBroker\T3api\Annotation\Serializer\Type\Image;
use SourceBroker\T3api\Annotation\Serializer\Type\Typolink;
use SourceBroker\T3api\Annotation\Serializer\VirtualProperty;

class FileReference extends \TYPO3\CMS\Extbase\Domain\Model\FileReference
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $alternative;

    /**
     * @var string
     * @Typolink
     */
    protected $link;

    /**
     * @VirtualProperty()
     * @Image(width=200, height="200c")
     */
    public function getImageThumbnail(): int
    {
        return $this->uid;
    }

    /**
     * @VirtualProperty()
     * @Image()
     */
    public function getImageOriginal(): int
    {
        return $this->uid;
    }
}

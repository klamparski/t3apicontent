<?php
declare(strict_types=1);

namespace Klamparski\T3apicontent\Domain\Model;

use Klamparski\T3apicontent\Annotation as T3apicontent ;
use SourceBroker\T3api\Annotation as T3api;
use TYPO3\CMS\Frontend\DataProcessing\SplitProcessor;
use TYPO3\CMS\Frontend\DataProcessing\CommaSeparatedValueProcessor;

class BulletsContentElement extends AbstractContentElement
{
    /**
     * @T3api\Serializer\Exclude()
     * @var string
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

    /**
     * @T3api\Serializer\VirtualProperty()
     * @T3api\Serializer\SerializedName("bullets")
     * @T3api\Serializer\Exclude(if="object.getBulletsType() > 1")
     * @T3apicontent\Serializer\Type\DataProcessor(
     *     SplitProcessor::class,
     *     configuration={
     *          "removeEmptyEntries": "1",
     *     },
     * )
     * @return string
     */
    public function getBulletsForList(): string
    {
        return $this->bodytext;
    }

    /**
     * @T3api\Serializer\VirtualProperty()
     * @T3api\Serializer\SerializedName("bullets")
     * @T3api\Serializer\Exclude(if="object.getBulletsType() !== 2")
     * @T3apicontent\Serializer\Type\DataProcessor(
     *     CommaSeparatedValueProcessor::class,
     *     configuration={
     *          "fieldDelimiter": "|",
     *     },
     * )
     * @return string
     */
    public function getBulletsForDefinitionList(): string
    {
        return $this->bodytext;
    }
}

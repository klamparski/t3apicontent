<?php

declare(strict_types=1);

namespace Klamparski\T3apicontent\Domain\Model;

use Klamparski\T3apicontent\Annotation as T3apicontent;
use SourceBroker\T3api\Annotation as T3api;
use TYPO3\CMS\Frontend\DataProcessing\CommaSeparatedValueProcessor;

class TableContentElement extends AbstractContentElement
{
    /**
     * @var string
     * @T3api\Serializer\Exclude()
     */
    protected $bodytext;

    /**
     * @var string
     */
    protected $tableClass;

    /**
     * @var string
     */
    protected $tableCaption;

    /**
     * @var int
     * @T3api\Serializer\Exclude()
     */
    protected $tableDelimiter;

    /**
     * @var int
     * @T3api\Serializer\Exclude()
     */
    protected $tableEnclosure;

    /**
     * @var int
     */
    protected $tableHeaderPosition;

    /**
     * @var int
     */
    protected $tableTfoot;

    public function getTableClass(): string
    {
        return $this->tableClass ?? '';
    }

    public function getTableCaption(): string
    {
        return $this->tableCaption ?? '';
    }

    public function getTableDelimiter(): int
    {
        return $this->tableDelimiter ?? 0;
    }

    public function getTableEnclosure(): int
    {
        return $this->tableEnclosure ?? 0;
    }

    public function getTableHeaderPosition(): int
    {
        return $this->tableHeaderPosition ?? 0;
    }

    public function getTableTfoot(): int
    {
        return $this->tableTfoot ?? 0;
    }

    /**
     * @T3api\Serializer\VirtualProperty()
     * @T3apicontent\Serializer\Type\DataProcessor(
     *     CommaSeparatedValueProcessor::class,
     *     configurationExpression={
     *          "fieldDelimiter": "chr(object.getTableDelimiter())",
     *          "fieldEnclosure": "chr(object.getTableEnclosure())",
     *     }
     * )
     * @return string
     */
    public function getTable(): string
    {
        return $this->bodytext ?? '';
    }
}

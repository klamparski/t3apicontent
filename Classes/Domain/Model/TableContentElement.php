<?php

declare(strict_types=1);

namespace Klamparski\T3apicontent\Domain\Model;

use Klamparski\T3apicontent\Annotation\Serializer\Type\CommaSeparatedValue;

class TableContentElement extends TextContentElement
{
    /**
     * @var string
     * TODO: passing somehow the table fields table_delimiter and table_enclosure into this annotation
     * @CommaSeparatedValue(fieldDelimiter=124, fieldEnclosure=0)
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
     */
    //protected $tableDelimiter;
    
    /**
     * @var int
     */
    //protected $tableEnclosure;
    
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
    
    /*public function getTableDelimiter(): int
    {
        return $this->tableDelimiter ?? 0;
    }*/
    
    /*public function getTableEnclosure(): int
    {
        return $this->tableEnclosure ?? 0;
    }*/
    
    public function getTableHeaderPosition(): int
    {
        return $this->tableHeaderPosition ?? 0;
    }
    
    public function getTableTfoot(): int
    {
        return $this->tableTfoot ?? 0;
    }
}

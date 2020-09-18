<?php

declare(strict_types=1);

namespace Klamparski\T3apicontent\Annotation\Serializer\Type;

use Klamparski\T3apicontent\Serializer\CommaSeparatedValueHandler;
use SourceBroker\T3api\Annotation\Serializer\Type\TypeInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * @Annotation
 * @Target({"PROPERTY","METHOD"})
 */
class CommaSeparatedValue implements TypeInterface
{
    /**
     * @var array
     */
    private $validDelimiters = [9 => '\t', 44 => ',', 58 => ':', 59 => ';', 124 => '|'];

    /**
     * @var array
     */
    private $validEnclosures = [0 => '', 39 => "'"]; // doc: 34 => '"' can not be a valid enclosure, because " char breaks the JMS parser

    /**
     * @var int
     */
    public $fieldDelimiter;

    /**
     * @var int
     */
    public $fieldEnclosure;

    /**
     * @return array
     */
    public function getParams(): array
    {
	$this->fieldDelimiter = array_key_exists($this->fieldDelimiter, $this->validDelimiters) ? $this->fieldDelimiter : 124;
	$this->fieldEnclosure = array_key_exists($this->fieldEnclosure, $this->validEnclosures) ? $this->fieldEnclosure : 0;

        return [
            $this->validDelimiters[$this->fieldDelimiter],
            $this->validEnclosures[$this->fieldEnclosure],
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return CommaSeparatedValueHandler::TYPE;
    }
}

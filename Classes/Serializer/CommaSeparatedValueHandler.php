<?php
declare(strict_types=1);

namespace Klamparski\T3apicontent\Serializer;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\Visitor\SerializationVisitorInterface;
use SourceBroker\T3api\Serializer\Handler\AbstractHandler;
use SourceBroker\T3api\Serializer\Handler\SerializeHandlerInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class CommaSeparatedValueHandler extends AbstractHandler implements SerializeHandlerInterface
{
    public const TYPE = 'CommaSeparatedValue';

    /**
     * @var string[]
     */
    protected static $supportedTypes = [self::TYPE];

    /**
     * @param SerializationVisitorInterface $visitor
     * @param string $content
     * @param array $type
     * @param SerializationContext $context
     * @return array
     */
    public function serialize(
        SerializationVisitorInterface $visitor,
        $content,
        array $type,
        SerializationContext $context
    ) {
	$commaSeparatedValueProcessor = GeneralUtility::makeInstance(\TYPO3\CMS\Frontend\DataProcessing\CommaSeparatedValueProcessor::class);
	$data = $commaSeparatedValueProcessor->process(
	    $this->getContentObjectRenderer(), // TODO: need to pass the current content-object here
	    [],
	    [
	        'as' => 'table',
		'fieldName' => 'bodytext',
		'fieldDelimiter' => $type['params'][0],
		'fieldEnclosure' => '0' //$type['params'][1] // TODO: solve PHP Warning: fgetcsv(): enclosure must be a character in /var/www/html/public/typo3/sysext/core/Classes/Utility/CsvUtility.php line 42
	    ],
	    []
	);
//\TYPO3\CMS\Core\Utility\DebugUtility::debug($data);exit;
    	return $data;
    }
    
    protected function getContentObjectRenderer(): ContentObjectRenderer
    {
        static $contentObjectRenderer;

        if (!$contentObjectRenderer instanceof ContentObjectRenderer) {
            $contentObjectRenderer = GeneralUtility::makeInstance(ContentObjectRenderer::class);
        }

        return $contentObjectRenderer;
    }
}

<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    static function () {

        $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['t3api']['serializerMetadataDirs'] = array_merge(
            $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['t3api']['serializerMetadataDirs'] ?? [],
            [
                'Klamparski.T3apicontent' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('t3apicontent') . 'Resources/Private/Serializer/Klamparski.T3apicontent',
            ]
        );

        $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['t3api']['serializerHandlers'] = array_merge(
            $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['t3api']['serializerHandlers'] ?? [],
            [
                \Klamparski\T3apicontent\Serializer\Handler\DataProcessorHandler::class,
                \Klamparski\T3apicontent\Serializer\RteHandler::class,
            ]
        );

    }
);

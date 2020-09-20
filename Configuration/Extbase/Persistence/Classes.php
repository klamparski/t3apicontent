<?php

declare(strict_types=1);

return [
    \Klamparski\T3apicontent\Domain\Model\AbstractContentElement::class => [
        'tableName' => 'tt_content',
        'properties' => [
            'type' => ['fieldName' => 'CType'],
            'colPos' => ['fieldName' => 'colPos'],
        ],
        'subclasses' => [
            'bullets' => \Klamparski\T3apicontent\Domain\Model\BulletsContentElement::class,
            'header' => \Klamparski\T3apicontent\Domain\Model\HeaderContentElement::class,
            'image' => \Klamparski\T3apicontent\Domain\Model\ImageContentElement::class,
            'table' => \Klamparski\T3apicontent\Domain\Model\TableContentElement::class,
            'text' => \Klamparski\T3apicontent\Domain\Model\TextContentElement::class,
            'textmedia' => \Klamparski\T3apicontent\Domain\Model\TextmediaContentElement::class,
            'textpic' => \Klamparski\T3apicontent\Domain\Model\TextpicContentElement::class,
            'uploads' => \Klamparski\T3apicontent\Domain\Model\UploadsContentElement::class,
        ],
    ],
    \Klamparski\T3apicontent\Domain\Model\BulletsContentElement::class => [
        'tableName' => 'tt_content',
        'recordType' => 'bullets',
    ],
    \Klamparski\T3apicontent\Domain\Model\HeaderContentElement::class => [
        'tableName' => 'tt_content',
        'recordType' => 'header',
    ],
    \Klamparski\T3apicontent\Domain\Model\ImageContentElement::class => [
        'tableName' => 'tt_content',
        'recordType' => 'image',
        'properties' => [
            'images' => ['fieldName' => 'image'],
        ],
    ],
    \Klamparski\T3apicontent\Domain\Model\TableContentElement::class => [
        'tableName' => 'tt_content',
        'recordType' => 'table',
    ],
    \Klamparski\T3apicontent\Domain\Model\TextContentElement::class => [
        'tableName' => 'tt_content',
        'recordType' => 'text',
    ],
    \Klamparski\T3apicontent\Domain\Model\TextmediaContentElement::class => [
        'tableName' => 'tt_content',
        'recordType' => 'textmedia',
    ],
    \Klamparski\T3apicontent\Domain\Model\TextpicContentElement::class => [
        'tableName' => 'tt_content',
        'recordType' => 'textpic',
        'properties' => [
            'images' => ['fieldName' => 'image'],
        ],
    ],
    \Klamparski\T3apicontent\Domain\Model\UploadsContentElement::class => [
        'tableName' => 'tt_content',
        'recordType' => 'uploads',
    ],
    \Klamparski\T3apicontent\Domain\Model\Page::class => [
        'tableName' => 'pages',
        'properties' => [
            'pages' => ['fieldName' => 'tx_t3apicontent_pages'],
            'contentElements' => ['fieldName' => 'tx_t3apicontent_content_elements'],
        ],
    ],
    \Klamparski\T3apicontent\Domain\Model\FileReference::class => [
        'tableName' => 'sys_file_reference',
    ],
];

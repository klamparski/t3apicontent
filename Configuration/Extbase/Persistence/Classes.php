<?php

declare(strict_types=1);

return [
    \Klamparski\T3apicontent\Domain\Model\ContentElement::class => [
        'tableName' => 'tt_content',
        'properties' => [
            'type' => ['fieldName' => 'CType'],
            'colPos' => ['fieldName' => 'colPos'],
        ],
        'subclasses' => [
            'header' => \Klamparski\T3apicontent\Domain\Model\HeaderContentElement::class,
            'text' => \Klamparski\T3apicontent\Domain\Model\TextContentElement::class,
            'textpic' => \Klamparski\T3apicontent\Domain\Model\TextAndImagesContentElement::class,
        ],
    ],
    \Klamparski\T3apicontent\Domain\Model\HeaderContentElement::class => [
        'tableName' => 'tt_content',
        'recordType' => 'header',
    ],
    \Klamparski\T3apicontent\Domain\Model\TextContentElement::class => [
        'tableName' => 'tt_content',
        'recordType' => 'text',
    ],
    \Klamparski\T3apicontent\Domain\Model\TextAndImagesContentElement::class => [
        'tableName' => 'tt_content',
        'recordType' => 'textpic',
        'properties' => [
            'images' => ['fieldName' => 'image'],
        ],
    ],
    \Klamparski\T3apicontent\Domain\Model\Page::class => [
        'tableName' => 'pages',
        'properties' => [
            'pages' => ['fieldName' => 'tx_t3apicontent_pages'],
            'contentElements' => ['fieldName' => 'tx_t3apicontent_content_elements'],
        ],
    ],
];

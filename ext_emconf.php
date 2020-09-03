<?php
/** @var string $_EXTKEY */

$EM_CONF[$_EXTKEY] = [
    'title' => 'T3apicontent',
    'description' => '',
    'category' => 'plugin',
    'author' => 'Karol Lamparski',
    'author_email' => 'klamparski@gmail.com',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '0.1',
    'constraints' => [
        'depends' => [
            'php' => '7.2.0-7.4.99',
            'typo3' => '10.4.0-10.4.99',
            't3api' => '',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];

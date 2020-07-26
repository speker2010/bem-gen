<?php 
require_once __DIR__ . '/vendor/autoload.php';

$block = [
    'headline' => [
        'margin' => '30px 0',
        'line-height' => 1
    ]
];

use bem\Block;

$blockInstance = new Block('headline', [
    'margin' => '30px 0',
    'line-height' => 1,
    '@:480px' => [
        'margin' => '15px'
    ],
    '_h1' => [
        'font-size' => '36px',
        '@:480px' => [
            'font-size' => '20px'
        ]
    ],
    '__small' => [
        'font-size' => '70%',
        '@:55' => [
            'font-size' => '50%'
        ],
        '_accent' => [
            'color' => 'blue',
            '@:1' => [
                'color' => 'gold'
            ]
        ]
    ]
]);

echo $blockInstance;
<?php

return [
    'parsers' => [
        'json' => \Christopheredjohnson\LaravelFileParser\Parsers\JsonParser::class,
        'csv' => \Christopheredjohnson\LaravelFileParser\Parsers\CsvParser::class,
        'xlsx' => \Christopheredjohnson\LaravelFileParser\Parsers\XlsxParser::class,
    ],
];

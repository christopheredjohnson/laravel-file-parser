<?php

namespace Christopheredjohnson\LaravelFileParser\Parsers;

use League\Csv\Reader;

class CsvParser implements ParserInterface
{
    public static function parse($filePath)
    {
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);

        return iterator_to_array($csv->getRecords());
    }
}

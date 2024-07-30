<?php

namespace Christopheredjohnson\LaravelFileParser\Parsers;

class XlsxParser implements ParserInterface
{
    /**
     * @return array[]
     */
    public static function parse($filePath, $config = [])
    {
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');

        $reader->setReadDataOnly(true);
        $reader->setReadEmptyCells(false);

        $spreadsheet = $reader->load($filePath);

        $worksheet = isset($config['sheetName'])
            ?
            $spreadsheet->getSheetByName($config['sheetName'])
            :
            $spreadsheet->getActiveSheet();

        $data = $worksheet->toArray('');

        $headers = array_shift($data);
        $nameArray = [];

        foreach ($data as $row) {
            $nameArray[] = array_combine($headers, $row);
        }

        return $nameArray;
    }
}

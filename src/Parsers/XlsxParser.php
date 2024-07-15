<?php

namespace Christopheredjohnson\LaravelFileParser\Parsers;

use PhpOffice\PhpSpreadsheet\Cell\CellAddress;
use PhpOffice\PhpSpreadsheet\IOFactory;

class XlsxParser implements ParserInterface
{
    public static function parse($filePath)
    {
        // Load the spreadsheet file
        $spreadsheet = IOFactory::load($filePath);

        $worksheet = $spreadsheet->getActiveSheet();

        // Initialize an empty array to store the data
        $data = [];

        // Get the highest row and column numbers referenced in the worksheet
        $highestRow = $worksheet->getHighestRow(); // e.g. 10
        $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'

        // Convert the highest column to a column index
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

        // Get the headers from the first row
        $headers = [];
        for ($col = 1; $col <= $highestColumnIndex; $col++) {
            $headers[] = $worksheet->getCell(CellAddress::fromColumnAndRow($col, 1))->getValue();
        }

        // Loop through each row of the worksheet starting from the second row
        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = [];

            // Loop through each column of the current row
            for ($col = 1; $col <= $highestColumnIndex; $col++) {
                $cellValue = $worksheet->getCell(CellAddress::fromColumnAndRow($col, $row))->getValue();
                $header = $headers[$col - 1];
                $rowData[$header] = $cellValue;
            }

            // Add the row data to the main data array
            $data[$row - 1] = $rowData;
        }

        return $data;
    }
}

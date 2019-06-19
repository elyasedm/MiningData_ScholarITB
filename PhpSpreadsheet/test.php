<?php

require 'vendor/autoload.php';
include('../db.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$inputFileName = '../ExportDataUser.xls';

$inputFileType = 'Xls';

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
$worksheet = $spreadsheet->getActiveSheet();

echo '<table>' . PHP_EOL;
foreach ($worksheet->getRowIterator() as $row) {
    echo '<tr>' . PHP_EOL;
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
    //    even if a cell value is not set.
    // By default, only cells that have a value
    //    set will be iterated.
    $iterasi = 1;
    foreach ($cellIterator as $cell) {
        $value = $cell->getValue();
        switch ($iterasi) {
            case 2:
                $id = $value;
                break;
            case 3:
                $nama = $value;
                break;
            case 4:
                $affiliation = $value;
                break;
            case 5:
                $total_cites = $value;
                break;
            case 6:
                $h_index = $value;
                break;
            case 7:
                $i10_index = $value;
                break;
            case 8:
                $fields = $value;
        }
        $homepage = NULL;
        echo '<td>' . $value . '</td>' . PHP_EOL;

        if ($iterasi == 8) {
            DB::query('INSERT INTO user VALUES (:id,:nama,:affiliation,:total_cites,:h_index,:i10_index,:fields,:homepage)', array(
                ':id' => $id, ':nama' => $nama, ':affiliation' => $affiliation, ':total_cites' => $total_cites, ':h_index' => $h_index, ':i10_index' => $i10_index,
                ':fields' => $fields, ':homepage' => $homepage
            ));
        }
        $iterasi++;
    }
    echo '</tr>' . PHP_EOL;
}
echo '</table>' . PHP_EOL;

echo "<br>fin";

<?php
    require 'vendor/autoload.php';
    include('./db.php');

for($i = 0 ; $i <50 ;$i++){

    //use PhpOffice\PhpSpreadsheet\Spreadsheet;
    //use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $inputFileName = [
        './data/user1pub.xlsx',
        './data/user2pub.xlsx',
        './data/user3pub.xlsx',
        './data/user4pub.xlsx',
        './data/user5pub.xlsx',
        './data/user6pub.xlsx',
        './data/user7pub.xlsx',
        './data/user8pub.xlsx',
        './data/user9pub.xlsx',
        './data/user10pub.xlsx',
        './data/user11pub.xlsx',
        './data/user12pub.xlsx',
        './data/user13pub.xlsx',
        './data/user14pub.xlsx',
        './data/user15pub.xlsx',
        './data/user16pub.xlsx',
        './data/user17pub.xlsx',
        './data/user18pub.xlsx',
        './data/user19pub.xlsx',
        './data/user20pub.xlsx',
        './data/user21pub.xlsx',
        './data/user22pub.xlsx',
        './data/user23pub.xlsx',
        './data/user24pub.xlsx',
        './data/user25pub.xlsx',
        './data/user26pub.xlsx',
        './data/user27pub.xlsx',
        './data/user28pub.xlsx',
        './data/user29pub.xlsx',
        './data/user30pub.xlsx',
        './data/user31pub.xlsx',
        './data/user32pub.xlsx',
        './data/user33pub.xlsx',
        './data/user34pub.xlsx',
        './data/user35pub.xlsx',
        './data/user36pub.xlsx',
        './data/user37pub.xlsx',
        './data/user38pub.xlsx',
        './data/user39pub.xlsx',
        './data/user40pub.xlsx',
        './data/user41pub.xlsx',
        './data/user42pub.xlsx',
        './data/user43pub.xlsx',
        './data/user44pub.xlsx',
        './data/user45pub.xlsx',
        './data/user46pub.xlsx',
        './data/user47pub.xlsx',
        './data/user48pub.xlsx',
        './data/user49pub.xlsx',
        './data/user50pub.xlsx'
    
    ];
    $inputFileType = 'Xlsx';
    // configure uplaod file 
    $dataIdUser = [
        "H0PYaZQAAAAJ",
        "BoUsMVkAAAAJ",
        "7tELn5QAAAAJ",
        "giUlRq4AAAAJ",
        "RR9tPfcAAAAJ",
        "55e1XOoAAAAJ",
        "hMwcQRoAAAAJ",
        "es1SkgsAAAAJ",
        "DmSoKLAAAAAJ",
        "ugYa9lEAAAAJ",
        "mtsqZw8AAAAJ",
        "hp-GQ1wAAAAJ",
        "l5mxkaIAAAAJ",
        "enA0yRIAAAAJ",
        "ky39jRwAAAAJ",
        "2GZTcTEAAAAJ",
        "5LPPbi8AAAAJ",
        "u_uC-XgAAAAJ",
        "uqfQVucAAAAJ",
        "lB60fkYAAAAJ",
        "XlYfULIAAAAJ",
        "5VjlHLwAAAAJ",
        "92hnSDQAAAAJ",
        "W_3gB7YAAAAJ",
        "4_asJ0MAAAAJ",
        "5nzwWmMAAAAJ",
        "uNgNRL0AAAAJ",
        "6URxueIAAAAJ",
        "Z3i8Fm4AAAAJ",
        "lyaV0HgAAAAJ",
        "U9ZCm_YAAAAJ",
        "y_3Vdi4AAAAJ",
        "A2w1T1IAAAAJ",
        "Ce85WLwAAAAJ",
        "-ricKxsAAAAJ",
        "Ik5Ft5EAAAAJ",
        "nYpfNbUAAAAJ",
        "IMH571IAAAAJ",
        "4BHp4PUAAAAJ",
        "IBMBDAYAAAAJ",
        "RY-2UG4AAAAJ",
        "YWHxmn0AAAAJ",
        "KTwli-UAAAAJ",
        "CuYa1ukAAAAJ",
        "4nuwSEIAAAAJ",
        "DN8OMFsAAAAJ",
        "R_DdbsIAAAAJ",
        "6IehtUsAAAAJ",
        "NoUUZzkAAAAJ",
        "W9kAg3cAAAAJ"

    ];
    $id = $i;
    $nomor = $id;
    $spreadsheet    = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName[$id]);
    $user_id        =                                              $dataIdUser[$id];
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
                case 9:
                    $id = $value;
                    break;
                case 2:
                    $title = $value;
                    break;
                case 3:
                    $author = $value;
                    break;
                case 4:
                    $jurnal = $value;
                    break;
                case 5:
                    $nomor = $value;
                    break;
                case 6:
                    $cites = $value;
                    break;
                case 7:
                    $year = $value;
                    break;
                case 8:
                    $cid = $value;
            }
            echo '<td>' . $value . '</td>' . PHP_EOL;

            if ($iterasi == 9) {
                DB::query('INSERT INTO publications VALUES (\'\',:id,:title,:author,:jurnal,:nomor,:cites,:year,:cid,:user_id)', array(
                    ':id' => $id, ':title' => $title, ':author' => $author, ':jurnal' => $jurnal, ':nomor' => $nomor, ':cites' => $cites, ':year' => $year, ':cid' => $cid, ':user_id' => $user_id
                ));
            }
            $iterasi++;
        }
        echo '</tr>' . PHP_EOL;
    }
    echo '</table>' . PHP_EOL;

    echo "<br>";
    DB::query('DELETE FROM publications WHERE title = "title"');
}

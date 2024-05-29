



<?php

// include the autoloader, so we can use PhpSpreadsheet
require_once(__DIR__ . '/vendor/autoload.php');

# Create a new Xls Reader
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

// Tell the reader to only read the data. Ignore formatting etc.
$reader->setReadDataOnly(true);

// Read the spreadsheet file.
$spreadsheet = $reader->load(__DIR__ . '/uploads/20240112065143.xlsx');

$sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
foreach ($sheet->getRowIterator() as $row) {
    if ($row->getRowIndex() === 0) {
        continue; //Skip heading
    }
    $cells = iterator_to_array($row->getCellIterator("A", "H"));
    echo  $cells["A"]->getValue();
	   echo  $cells["B"]->getValue();
    
}

#var_dump($data[3]);
#echo $data[2];


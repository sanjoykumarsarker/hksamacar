<?php

  //Had to change this path to point to IOFactory.php.
  //Do not change the contents of the PHPExcel-1.8 folder at all.
  include('PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');

  //Use whatever path to an Excel file you need.
  $inputFileName = 'SMS_sep17.xlsx';
  $result = array();
  try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
  } catch (Exception $e) {
    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . 
        $e->getMessage());
  }

  $sheet = $objPHPExcel->getSheet(2);
  $highestRow = $sheet->getHighestRow();
  $highestColumn = $sheet->getHighestColumn();


  
  //echo $value = $sheet->getCell( 'B2' )->getValue();
 for ($row = 1; $row <= $highestRow; $row++) { 
  
     //for ($row = 1; $row <=1 ; $row++) {
 //print_r($row);
  //  $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false);
		


$num = $sheet->getCell( 'C'.$row )->getValue();
$agent = $sheet->getCell( 'B'.$row )->getValue();
 $condition = $sheet->getCell( 'E'.$row )->getValue();
 $circu = $sheet->getCell( 'D'.$row )->getValue();
  $courier = $sheet->getCell( 'F'.$row )->getValue();

   $rcpt = $sheet->getCell( 'G'.$row )->getValue();


		
		 array_push($result,
array('id'=>"হরে কৃষ্ণ, ".$agent."। ২৪.৮.১৭ তারিখে আপনাকে ".$circu." কপি পত্রিকা ".$courier." পরিবহনে পাঠানো হয়েছে। শর্ত ".$condition." টাকা, রসিদ নং ".$rcpt."। @ মাসিক হরেকৃষ্ণ সমাচার। ",
 
'phone'=>$num
));
 
  }
echo json_encode(array("result"=>$result));							
				 		

    //Prints out data in each row.
    //Replace this with whatever you want to do with the data.
  
    //  print_r($rowData);
  
 
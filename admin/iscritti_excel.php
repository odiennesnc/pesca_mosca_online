<?
include 'config.inc.php';
require_once 'PHPExcel.php';

date_default_timezone_set('Europe/Rome');

$connection = @mysql_connect(DB_HOST,DB_USER,DB_PASS);
$query = "SELECT * FROM registrati WHERE congresso_id = '" . $_GET["congresso_id"] . "' ORDER BY id";
$result=db_query($query);

// Instantiate a new PHPExcel object 
$objPHPExcel = new PHPExcel();  
// Set the active Excel worksheet to sheet 0 
$objPHPExcel->setActiveSheetIndex(0);  
// Initialise the Excel row number 
$rowCount = 1;

//start of printing column names as names of MySQL fields  
$column = 'A';
for ($i = 0; $i < mysql_num_fields($result); $i++)
{
    $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, mysql_field_name($result,$i));
    $column++;
}
//end of adding column names  

//start while loop to get data  
$rowCount = 1;
while($row = mysql_fetch_row($result))  
{  
    $column = 'A';
    for($j=0; $j<mysql_num_fields($result);$j++)
    {  
        if(!isset($row[$j]))  
            $value = NULL;  
        elseif ($row[$j] != "")  
            $value = strip_tags($row[$j]);  
        else  
            $value = "";  

        $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $value);
        $column++;
    }  
    $rowCount++;
} 


// Redirect output to a client’s web browser (Excel5) 
header('Content-Type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment;filename="richieste_neuropathology_2019.xls"');
header('Cache-Control: max-age=0'); 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
$objWriter->save('php://output');

?>

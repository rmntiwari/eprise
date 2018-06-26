<?php
header("Cache-Control: no-cache");
ob_start();
ini_set('memory_limit', '-1');

chdir("php_pear_xls");
require_once 'Writer.php';

$sheet1=$recent_reports_rows; //array ready to write xls
$workbook = new Spreadsheet_Excel_Writer();
$format_title =& $workbook->addFormat();
$format_title->setBorder(2);//thick
$format_title->setBold();
$format_title->setColor('black');
$format_title->setFontFamily('Arial');
$format_title->setSize(10);
$format_title->setFgcolor('silver');

$format_text =& $workbook->addFormat();
$format_text->setBottom(0);//thick
//$format_text->setBold();
$format_text->setColor('black');
$format_text->setFontFamily('Arial');
$format_text->setSize(10);

$arr_stats = array('Recent_Activity_Reports'=>$sheet1);
foreach($arr_stats as $wbname=>$rows)
{
    $rowcount = count($rows);
    $colcount = count($rows[0]);
    $worksheet =& $workbook->addWorksheet($wbname);
    $worksheet->setColumn(0,$colcount,15.00);
    for( $j=0; $j<$rowcount; $j++ )
    {
        for($i=0; $i<$colcount;$i++)
        {
            if($j==0 )
            {
                $fmt  =& $format_title;
            }
            else if($j==2 || $j==5 || $j==$count_summary_rows)
            {
                $fmt  =& $format_text;
            }
            else if($j==6 || $j==$count_summary_rows+1)
            {
                $fmt  =& $format_text;
            }
            else
            {
                $fmt  =& $format_text;
            }

            if (isset($rows[$j][$i]))
            {
                $data=$rows[$j][$i];
                $worksheet->write($j, $i, $data, $fmt);
            }
        }
    }
}
$fname="Recent_Activity_Reports_Of_Last_".$days."_Days";
$file_name=$fname.".xls";
$workbook->send($file_name);
$workbook->close();

ob_end_flush();
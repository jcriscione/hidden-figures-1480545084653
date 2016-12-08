<?php

$csv_filename = 'emails_'.date('Y-m-d').'.csv';




$connect = mysqli_connect("hf.darkerside.com", "bajuk", "Ca1abash", "hiddenfigures");

$result = mysqli_query($connect, "SELECT * FROM emails");

$data = array();
$rows = array();

$csv_export = '';


$field = mysqli_num_fields($result);
$rows = mysqli_num_rows($result);


echo("rows="+ $rows);

//for($i = 0; $i < $field; $i++) {
//  $csv_export.= mysql_field_name($result,$i).';';
//}

//$csv_export.= '
//';

// loop through database query and fill export variable

//while($row = mysqli_fetch_array($result)) {

//  for($i = 0; $i < $rows; $i++) {
//    $csv_export.= '"'.$row[mysqli_fetch_field($result,$i)].'";';
//  }
//  $csv_export.= '
//';

    $i = 0;
	while ($i < mysqli_num_fields($result))
	{
		$meta = mysql_fetch_field($result, $i);
		$csv_export = $meta->name;
		$i = $i + 1;
		echo("csv_export="+ $csv_export);
	}


	$i = 0;
	while ($row = mysqli_fetch_row($result))
	{
		$y = 0;
		while ($y < count($row))
		{
			$c_row = current($row);
			$csv_export = $c_row;
			next($row);
			$y = $y + 1;
		}
		$i = $i + 1;
		echo("csv_export="+ $csv_export);
	}





    // Export the data and prompt a csv file for download
   // header("Content-type: text/x-csv");
   // header("Content-Disposition: attachment; filename=".$csv_filename."");
   // echo($csv_export);


?>


<?php

$db_record = 'emails';

// filename for export
$csv_filename = 'emails.csv';

// database variables
$hostname = "hf.darkerside.com";
$user = "bajuk";
$password = "Ca1abash";
$database = "hiddenfigures";



mysqli_select_db($database)
or die ('Could not select database ' . mysql_error());




$csv_export.= '';

// loop through database query and fill export variable
while($row = mysql_fetch_array($query)) {
  for($i = 0; $i < $field; $i++) {
    $csv_export.= '"'.$row[mysqli_field_name($query,$i)].'";';
  }	
  $csv_export.= '
';

    $output = "<script>console.log( 'Debug Objects: " . implode( ',', $csv_export) . "' );</script>";
}

// Export the data and prompt a csv file for download
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=".$csv_filename."");
echo($csv_export);

?>
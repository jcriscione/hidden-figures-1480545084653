<?php


$db_record = 'emails';

// filename for export
$csv_filename = 'emails.csv';

// database variables
$hostname = "hf.darkerside.com";
$user = "bajuk";
$password = "Ca1abash";
$database = "hiddenfigures";

// Database connecten voor alle services


mysqli_select_db($database)
or die ('Could not select database ' . mysql_error());

// create empty variable to be filled with export data
$csv_export = '';

// query to get data from database
$query = mysqli_query("SELECT * FROM ".$db_record." ".$where);
$field = mysqli_num_fields($query);

// create line with field names
for($i = 0; $i < $field; $i++) {
  $csv_export.= mysqli_field_name($query,$i).';';


}


$csv_export.= '
';

// loop through database query and fill export variable
while($row = mysql_fetch_array($query)) {
  for($i = 0; $i < $field; $i++) {
    $csv_export.= '"'.$row[mysqli_field_name($query,$i)].'";';
  }	
  $csv_export.= '
';


}

// Export the data and prompt a csv file for download
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=".$csv_filename."");
echo($csv_export);

?>
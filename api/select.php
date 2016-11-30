<?php
//database settings
$connect = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b9bc1dccb0e2b1", "1448b1f8", "ad_6ab36756b189743");

$result = mysqli_query($connect, "SELECT * FROM users");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);

    $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

?>

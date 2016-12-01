<?php

//$connect = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b9bc1dccb0e2b1", "1448b1f8", "ad_6ab36756b189743");

$connect = mysqli_connect("hf.darkerside.com", "bajuk", "Ca1abash", "hiddenfigures");

$result = mysqli_query($connect, "SELECT * FROM emails");

$data = array();
$rows = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}
    print json_encode($data);


?>

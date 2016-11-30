<?php

$data = json_decode(file_get_contents("php://input"));


$con = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b9bc1dccb0e2b1", "1448b1f8", "ad_6ab36756b189743");

$uemail = mysqli_escape_string($con, $data->uemail);
$photoid = mysqli_escape_string($con, $data->photoid);

// Check connection

if (mysqli_connect_errno()) {

	echo "Failed to connect to MYSQL : " . mysqli_connect_error();
}

// Perform queries

mysqli_query($con, "INSERT INTO `users`(`email`, `photoid`) VALUES ('". $uemail ."','". $photoid ."')");

mysqli_close($con);






?>

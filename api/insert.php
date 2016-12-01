<?php

$data = json_decode(file_get_contents("php://input"));


$con = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b9bc1dccb0e2b1", "1448b1f8", "ad_6ab36756b189743");

$email = mysqli_escape_string($con, $data->email);
$photoid = mysqli_escape_string($con, $data->photoid);

// Check connection

if (mysqli_connect_errno()) {

	echo "Failed to connect to MYSQL : " . mysqli_connect_error();
}

// Perform queries


if (mysqli_query($con, "INSERT INTO `emails`(`email`, `photoid`) VALUES ('". $email ."','". $photoid ."')") or die(mysql_error())) {
  echo 'Success';
} else {
  echo 'Fail';
}

mysqli_close($con);


?>

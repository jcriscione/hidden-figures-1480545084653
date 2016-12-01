<?php
//database settings
//$connect = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b9bc1dccb0e2b1", "1448b1f8", "ad_6ab36756b189743");

//$connect = mysqli_connect("hf.darkerside.com", "bajuk", "Ca1abash", "hiddenfigures");

//$result = mysqli_query($connect, "SELECT * FROM emails");

$data = array();
$rows = array();

//while ($row = mysqli_fetch_array($result)) {
//  $data[] = $row;
//}
    //print json_encode($data);

    //echo("<script>console.log('PHP: ".$data."');</script>");



$sql = new mysqli("hf.darkerside.com", "bajuk", "Ca1abash", "hiddenfigures");
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit;
}

$query = "SELECT * FROM emails";
$result = $sql->query($query);
if (!$result) {
  printf("Query failed: %s\n", $mysqli->error);
  exit;
}
while($row = $result->fetch_row()) {
  $rows[]=$row;

  echo("<script>console.log('PHP: ".$row."');</script>");
}
//$result->close();
//$sql->close();
return $rows;
$data[] = $rows;

print json_encode($data);
echo("<script>console.log('PHP: ".$data."');</script>");






?>

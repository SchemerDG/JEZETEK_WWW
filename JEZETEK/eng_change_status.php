<?php
header("Content-type: text/html; charset=utf-8");
$data = $_POST['data']; 
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$sql="update engineerings SET status_id='".$data['status_id'].
"' WHERE engineering_id='".$data['id']."'";

$arr[]=mysql_query($sql);

echo json_encode($arr);
mysql_close($con);


?>
<?php
header("Content-type: text/html; charset=utf-8");
$data = $_POST['data']; 
$id = $_POST['id']; 
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$sql="INSERT INTO engineering_log(engineering_id, time, motion, information) VALUES ('"
.$id."','"
.$data['time']."','"
.$data['motion']."','"
.$data['information']."')";
$arr[]=mysql_query($sql);
echo json_encode($arr);
mysql_close($con);
$arr[]='OK';
echo json_encode($arr);
?>
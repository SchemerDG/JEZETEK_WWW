<?php
header("Content-type: text/html; charset=utf-8");
$id = $_POST['eng_id']; 
$data=$_POST['classification_id'];
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$sql="DELETE FROM engineerings WHERE engineering_id='".$id."'";
mysql_query($sql);
$sql="DELETE FROM engineering_data WHERE engineering_id='".$id."'";
mysql_query($sql);
$sql="DELETE FROM engineering_log WHERE engineering_id='".$id."'";
mysql_query($sql);
$sql="DELETE FROM engineering_used_virtual_device WHERE engineering_id='".$id."'";
mysql_query($sql);
$arr[]=true;
echo json_encode($arr);
mysql_close($con);
?>
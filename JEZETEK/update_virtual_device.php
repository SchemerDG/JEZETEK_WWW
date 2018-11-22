<?php
header("Content-type: text/html; charset=utf-8");
$unit_id = $_POST['virtual_unit_id']; 
$chno = $_POST['chno']; 
$device_id = $_POST['virtual_device_id']; 
$eng_id=$_POST['eng_id']; 
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$sql="update virtual_devices SET unit_id='".$unit_id.
"',chno='".$chno.
"' WHERE device_id='".$device_id ."'";
mysql_query($sql);
mysql_close($con);

include('get_virtual_subsystems_function.php');
get_virtual_subsystem_function($eng_id);
?>
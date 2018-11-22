<?php
header("Content-type: text/html; charset=utf-8");
$device_id = $_POST['virtual_device_id']; 
$eng_id=$_POST['eng_id']; 
//插入用户登录信息
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
$sql="select * from engineering_used_virtual_device where engineering_id='".$eng_id."' and virtual_device_id='".$device_id."'";
$check_query=mysql_query($sql);
$flagx=false;
if(!mysql_fetch_array($check_query))
{
	$flagx=true;
}

if($flagx)
{
	$sql="DELETE FROM virtual_devices WHERE device_id='".$device_id."'";
	mysql_query($sql);
}
mysql_close($con);
include('get_virtual_subsystems_function.php');
get_virtual_subsystem_function($eng_id);

?>
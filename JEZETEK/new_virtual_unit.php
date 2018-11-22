<?php
header("Content-type: text/html; charset=utf-8");
$unit_name = $_POST['unit_name'];  
$subsystem_id=$_POST['subsystem_id'];  
$eng_id=$_POST['eng_id'];  
//插入用户登录信息
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
if($subsystem_id=='')
{$sql="INSERT INTO virtual_units(unit_name,engineering_id) VALUES ('".$unit_name."','".$eng_id."')";}
else
{$sql="INSERT INTO virtual_units(unit_name,subsystems_id,engineering_id) VALUES ('".$unit_name."','".$subsystem_id."','".$eng_id."')";}

mysql_query($sql);
mysql_close($con);
include('get_virtual_subsystems_function.php');
get_virtual_subsystem_function($eng_id);
?>
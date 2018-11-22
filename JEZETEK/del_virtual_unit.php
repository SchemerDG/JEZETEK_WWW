<?php
header("Content-type: text/html; charset=utf-8");
$unit_id = $_POST['virtual_unit_id']; 
$eng_id=$_POST['eng_id']; 
//插入用户登录信息
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$sql="DELETE FROM virtual_units WHERE unit_id='".$unit_id."'";
mysql_query($sql);
mysql_close($con);
include('get_virtual_subsystems_function.php');
get_virtual_subsystem_function($eng_id);
?>
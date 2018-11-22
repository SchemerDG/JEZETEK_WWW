<?php
header("Content-type: text/html; charset=utf-8");
$subsystem_name = $_POST['subsystem_name'];  
$eng_id=$_POST['eng_id'];  
//插入
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$sql="INSERT INTO virtual_subsystems(subsystems_name,engineering_id) VALUES ('".$subsystem_name."','".$eng_id."')";
mysql_query($sql);

mysql_close($con);

include('get_virtual_subsystems_function.php');
get_virtual_subsystem_function($eng_id);
?>
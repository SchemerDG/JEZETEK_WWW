<?php
header("Content-type: text/html; charset=utf-8");
$unit_id = $_POST['virtual_unit_id']; 
$subsystem_id = $_POST['subsystem_id']; 
$eng_id=$_POST['eng_id']; 
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
if($subsystem_id==''){
	$sql="update virtual_units SET subsystems_id=null WHERE unit_id='".$unit_id ."'";
}
else{
	$sql="update virtual_units SET subsystems_id='".$subsystem_id."' WHERE unit_id='".$unit_id ."'";
}

mysql_query($sql);
mysql_close($con);

include('get_virtual_subsystems_function.php');
get_virtual_subsystem_function($eng_id);

?>
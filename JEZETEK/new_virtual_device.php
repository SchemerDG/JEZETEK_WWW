<?php
header("Content-type: text/html; charset=utf-8");
include('get_virtual_subsystems_function.php');
$unit_id = $_POST['unit_id'];  
$device_id=$_POST['device_id'];  
$eng_id=$_POST['eng_id'];  
$chno=$_POST['chno'];
//插入用户登录信息
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
$sql="select * from devices where device_id='".$device_id."'";
$check_query = mysql_query($sql);
if($result=mysql_fetch_array($check_query))
{
	$sql1="INSERT INTO virtual_devices(device_name, unit_id, register_status, valid_time, register_person_id, register_time, description, controller_model,controller_serial_number,controller_hardware_version,controller_sys_software, controller_app_software, controller_device_status, controller_start_datetime, controller_working_time, controller_information, performer_model, performer_serial_number, performer_hardware_version, performer_sys_software, performer_app_software, performer_device_status, performer_start_datetime, performer_working_time, performer_information, chno, support_num,real_device_id) VALUES ('".$result['device_name']."','".$unit_id ."','".$result['register_status']."','".$result['valid_time']."','".$result['register_person_id']."','".$result['register_time']."','".$result['description']."','".$result['controller_model']."','".$result['controller_serial_number']."','".$result['controller_hardware_version']."','".$result['controller_sys_software']."','".$result['controller_app_software']."','".$result['controller_device_status']."','".$result['controller_start_datetime']."','".$result['controller_working_time']."','".$result['controller_information']."','".$result['performer_model']."','".$result['performer_serial_number']."','".$result['performer_hardware_version']."','".$result['performer_sys_software']."','".$result['performer_app_software']."','".$result['performer_device_status']."','".$result['performer_start_datetime']."','".$result['performer_working_time']."','".$result['performer_information']."','".$chno."','".$result['support_num']."','".$result['device_id']."')";
	$check_query1 = mysql_query($sql1);
}
mysql_close($con);
get_virtual_subsystem_function($eng_id);
?>
<?php
header("Content-type: text/html; charset=utf-8");
$device_id = $_POST['device_id']; 

$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

//输出
$arr=array();

$sql="SELECT * FROM devices where device_id='".$device_id."'";
$check_query = mysql_query($sql);
while($result=mysql_fetch_array($check_query))
{
	$arr['information']['id']=$result['device_id'];
	$arr['information']['signuper_id']=$result['register_person_id'];
	$sql1="SELECT * FROM login_user where USER_ID='".$result['register_person_id']."'";
	$check_query1 = mysql_query($sql1);
	while($result1=mysql_fetch_array($check_query1))
	{
		$arr['information']['signuper']=$result1['USER_NAME'];
	}	
	$arr['information']['objename']=$result['device_name'];
	$arr['information']['sysignup']=$result['register_status'];
	
	$arr['information']['localunit_id']=$result['unit_id'];
	$sql1="SELECT * FROM units where unit_id='".$result['unit_id']."'";
	$check_query1 = mysql_query($sql1);
	while($result1=mysql_fetch_array($check_query1))
	{
		$arr['information']['localunit']=$result1['unit_name'];
	}
	$arr['information']['expirydate']=$result['valid_time'];
	$arr['information']['signupdate']=$result['register_time'];
	$arr['information']['description']=$result['description'];
	if($result['register_status']=='0')
	{
		$arr['information']['signuper_id']='';
		$arr['information']['signupdate']='';
		$arr['information']['expirydate']='';
		$arr['information']['signuper']='';
	}
	
	$arr['controller']['model']=$result['controller_model'];
	$arr['controller']['series']=$result['controller_serial_number'];
	$arr['controller']['version']=$result['controller_hardware_version'];
	$arr['controller']['systemSoft']=$result['controller_sys_software'];
	$arr['controller']['excuteSoft']=$result['controller_app_software'];
	$arr['controller']['status']=$result['controller_device_status'];
	$arr['controller']['startDate']=$result['controller_start_datetime'];
	$arr['controller']['workingDuring']=$result['controller_working_time'];
	$arr['controller']['information']=$result['controller_information'];
	
	$arr['performer']['model']=$result['performer_model'];
	$arr['performer']['series']=$result['performer_serial_number'];
	$arr['performer']['version']=$result['performer_hardware_version'];
	$arr['performer']['systemSoft']=$result['performer_sys_software'];
	$arr['performer']['excuteSoft']=$result['performer_app_software'];
	$arr['performer']['status']=$result['performer_device_status'];
	$arr['performer']['startDate']=$result['performer_start_datetime'];
	$arr['performer']['workingDuring']=$result['performer_working_time'];
	$arr['performer']['information']=$result['performer_information'];
}
$arr['log']=array();
$sql="SELECT * FROM devices_log where device_id='".$device_id."'";
$check_query = mysql_query($sql);
while($result=mysql_fetch_array($check_query))
{
	
	$children['date']=$result['datatime'];
	$children['operation']=$result['type'];
	$children['result']=$result['content'];
	
	$sql1="SELECT * FROM login_user where USER_ID='".$result['hanler_id']."'";
	$check_query1 = mysql_query($sql1);
	while($result1=mysql_fetch_array($check_query1))
	{
		$children['operator']=$result1['USER_NAME'];
	}	
	array_push($arr['log'],$children);
}


echo json_encode($arr);
mysql_close($con);

?>
<?php
header("Content-type: text/html; charset=utf-8");
$device_information=$_POST['device_information'];

$con = mysql_connect("localhost","root","localhost");

if (!$con)
{
die('Could not connect: ' . mysql_error());
}

mysql_select_db("JEZETEK", $con);

mysql_query("set names utf8");
if($device_information['signuper_id']=='now_user_id')
{
	@session_start();
	$device_information['signuper_id']=$_SESSION['userid'];
}
$sql="UPDATE devices SET device_name='".$device_information['objename']."',description='".$device_information['description']."',unit_id='".$device_information['localunit_id']."',register_time='".$device_information['signupdate']."',register_person_id='".$device_information['signuper_id']."',valid_time='".$device_information['expirydate']."',register_status='".$device_information['sysignup']."'WHERE device_id='".$device_information['id']."'";
$arr1[]=$sql;
$arr1[]=mysql_query($sql);

echo json_encode($arr1);//要增加中括号，否则数据格式前端解析不正常
mysql_close($con);
?>
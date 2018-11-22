<?php
header("Content-type: text/html; charset=utf-8");
$userid = $_POST['userid'];  
$user_id=$userid;
$con = mysql_connect("localhost","root","localhost");
$arr=array();
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
//查询账号基本信息
$sql="SELECT * FROM user_information where user_id='".$user_id."'";
$check_query = mysql_query($sql);

if($result=mysql_fetch_array($check_query))
{
	//$arr['username']=$result['USER_NAME'];
	$arr['userid']=$result['user_no'];
	$arr['department']=$result['user_department'];
	$arr['position']=$result['user_duty'];
	//$arr['loginId']=$result['USER_ID'];
	//$arr['password']=$result['USER_PASSWORD'];
	$arr['phoneMac']=$result['user_phone_mac'];
	$arr['PCMac']=$result['user_pc_mac'];
	$arr['device']=$result['user_login_device'];
	$arr['area']=$result['user_login_area'];
	$arr['register']=$result['user_registrant'];
	$arr['regiTime']=$result['user_registration_date'];
	 
}
//查询账号密码信息
$sql="SELECT * FROM login_user where user_id='".$user_id."'";
$check_query = mysql_query($sql);

if($result=mysql_fetch_array($check_query))
{
	$arr['username']=$result['USER_NAME'];
	//$arr['userid']=$result['user_no'];
	//$arr['department']=$result['user_department'];
	//$arr['position']=$result['user_duty'];
	$arr['loginId']=$result['USER_ID'];
	$arr['password']=$result['USER_PASSWORD'];
	//$arr['phoneMac']=$result['user_phone_mac'];
	//$arr['PCMac']=$result['user_pc_mac'];
	//$arr['device']=$result['user_login_device'];
	//$arr['area']=$result['user_login_area'];
	//$arr['register']=$result['user_registrant'];
	//$arr['regiTime']=$result['user_registration_date'];
	 
}
mysql_close($con);	

echo json_encode($arr);
?>
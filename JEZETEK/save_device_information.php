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

/*
//输出
$arr=array();
$arr['name']='DEVISER组态工作栈管理系统';
$arr['open']=true;
$arr['isParent']=true;
$arr['children']=array();
$sql="SELECT * FROM subsystems";
$check_query = mysql_query($sql);
while($result=mysql_fetch_array($check_query))
{
	$children['name']=$result['subsystems_name'];
	$children['id']=$result['subsystems_id'];
	$children['children']=array();
	$children['type']='subsystem';
	$sql1="SELECT * FROM units where subsystems_id='".$result['subsystems_id']."'";
	$check_query1 = mysql_query($sql1);
	while($result1=mysql_fetch_array($check_query1))
	{
		$chidren_1['id']=$result1['unit_id'];
		$chidren_1['name']=$result1['unit_name'];
		$chidren_1['type']='unit';
		$chidren_1['children']=array();
		$sql2="SELECT * FROM devices where unit_id='".$result1['unit_id']."'";
		$check_query2 = mysql_query($sql2);
		while($result2=mysql_fetch_array($check_query2))
		{
			$chidren_2['id']=$result2['device_id'];
			$chidren_2['name']=$result2['device_name'];
			$chidren_2['type']='device';
			$chidren_2['all_num']='';
			array_push($chidren_1['children'],$chidren_2);
		}
		array_push($children['children'],$chidren_1);
	}
	array_push($arr['children'],$children);
}


$sql1="SELECT * FROM units";
$check_query1 = mysql_query($sql1);
while($result1=mysql_fetch_array($check_query1))
{
	if($result1['subsystems_id']=='')
	{
		$children1['name']=$result1['unit_name'];
		$children1['id']=$result1['unit_id'];
		$children1['children']=array();
		$children1['type']='unit';
		$sql2="SELECT * FROM devices where unit_id='".$result1['unit_id']."'";
		$check_query2 = mysql_query($sql2);
		while($result2=mysql_fetch_array($check_query2))
		{
			$chidren_2['id']=$result2['device_id'];
			$chidren_2['name']=$result2['device_name'];
			$chidren_2['type']='device';
			$chidren_2['all_num']='';
			array_push($chidren_1['children'],$chidren_2);
		}
		array_push($arr['children'],$children1);
	}
}*/
echo json_encode($arr1);//要增加中括号，否则数据格式前端解析不正常
mysql_close($con);
?>
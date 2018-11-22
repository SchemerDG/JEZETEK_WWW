<?php
header("Content-type: text/html; charset=utf-8");
$unit_id = $_POST['unit_id']; 

$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

//输出
$arr=array();

$sql="SELECT * FROM units where unit_id='".$unit_id."'";
$check_query = mysql_query($sql);
while($result=mysql_fetch_array($check_query))
{
	$arr['id']=$result['unit_id'];
	$arr['signuper']='';
	$arr['objename']=$result['unit_name'];
	$arr['sysignup']='';
	
	if($result['subsystems_id']!='')
	{
		$sql1="SELECT * FROM subsystems where subsystems_id='".$result['subsystems_id']."'";
		$check_query1 = mysql_query($sql1);
		while($result1=mysql_fetch_array($check_query1))
		{
			$arr['localunit']=$result1['subsystems_name'];
		}
		$arr['localunit_id']=$result['subsystems_id'];
	}
	else
	{
		$arr['localunit']='DEVISER组态工作栈管理系统';
		$arr['localunit_id']='-1';
	}
	
	
	$arr['expirydate']='';
	$arr['signupdate']='';
	$arr['description']=$result['description'];
	
}
echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常
mysql_close($con);

?>
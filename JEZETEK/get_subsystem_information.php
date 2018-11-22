<?php
header("Content-type: text/html; charset=utf-8");
$subsystem_id = $_POST['subsystem_id']; 
//插入用户登录信息
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

//输出
$arr=array();

$sql="SELECT * FROM subsystems where subsystems_id='".$subsystem_id."'";
$check_query = mysql_query($sql);
while($result=mysql_fetch_array($check_query))
{
	$arr['id']=$result['subsystems_id'];
	$arr['signuper']='';
	$arr['objename']=$result['subsystems_name'];
	$arr['sysignup']='';
	$arr['localunit']='DEVISER组态工作栈管理系统';
	$arr['localunit_id']='-1';
	$arr['expirydate']='';
	$arr['signupdate']='';
	$arr['description']=$result['description'];
	
}
echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常
mysql_close($con);

?>
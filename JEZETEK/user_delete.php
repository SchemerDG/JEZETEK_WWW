<?php
header("Content-type: text/html; charset=utf-8");
$data = $_POST['userid'];  


//删除用户登录信息
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
$sql="DELETE FROM login_user WHERE user_id='".$data."'";
mysql_query($sql);


//删除用户基本信息
$sql="DELETE FROM user_information WHERE user_id='".$data."'";
mysql_query($sql);


//插删除用户权限信息
$sql="DELETE FROM user_limit WHERE user_id='".$data."'";
mysql_query($sql);

//输出用户列表

$arr=array();
$arr['id']='1';
$arr['name']='DEVISER组态工作栈管理系统';
$arr['children']=array();
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
$sql="SELECT * FROM login_user";
$check_query = mysql_query($sql);
$i=0;
while($result=mysql_fetch_array($check_query))
{
	$children['id']="$i";
	$children['name']=$result['USER_NAME'];
	$children['user_id']=$result['USER_ID'];
	array_push($arr['children'],$children);
	$i++;	
}
echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常
mysql_close($con);


?>
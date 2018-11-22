<?php
header("Content-type: text/html; charset=utf-8");
//$username = $_POST['userName'];  

//插入用户登录信息
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
$sql="INSERT INTO login_user(USER_NAME, USER_ID, USER_PASSWORD, USER_STATUE) VALUES ('未命名','recieve','recieve',0)";
mysql_query($sql);

//插入用户基本信息
$sql="INSERT INTO user_information(USER_ID,user_registration_date) VALUES ('recieve','".date('y-m-d H:i:s',time())."')";
mysql_query($sql);
//插入用户权限信息
$sql="INSERT INTO user_limit(USER_ID) VALUES ('recieve')";
mysql_query($sql);

//输出用户列表
$arr=array();
$arr['id']='1';
$arr['name']='DEVISER组态工作栈管理系统';
$arr['children']=array();
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
echo json_encode($arr);
mysql_close($con);

?>
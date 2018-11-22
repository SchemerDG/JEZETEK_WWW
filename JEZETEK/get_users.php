<?php
header("Content-type: text/html; charset=utf-8");
$username = $_POST['userName'];  
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
$arr=array();
$arr['id']=1;
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
echo json_encode($arr);
mysql_close($con);


?>
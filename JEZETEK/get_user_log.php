<?php
header("Content-type: text/html; charset=utf-8");
$data = $_POST['userid'];  
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
$arr=array();
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
$sql="SELECT * FROM user_log where user_id='".$data."'";
$check_query = mysql_query($sql);
$i=0;
while($result=mysql_fetch_array($check_query))
{	
	$children['id']=$i;	
	$children['content']=[$result['operation_time'],$result['operation'],$result['operation_information']];
	$arr[]=$children;
	$i++;	
}

echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常
mysql_close($con);


?>
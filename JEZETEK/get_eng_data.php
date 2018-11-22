<?php
header("Content-type: text/html; charset=utf-8");

$eng_id=$_POST['eng_id'];  
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$arr=array();
$sql="SELECT * FROM engineering_data where engineering_id='".$eng_id."'";
$check_query = mysql_query($sql);
if($result=mysql_fetch_array($check_query))
{
	$arr['id']=$result['engineering_id'];
	$arr['data']=explode("\r\n",$result['data']);
}

echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常
mysql_close($con);
?>
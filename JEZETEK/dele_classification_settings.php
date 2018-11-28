<?php
header("Content-type: text/html; charset=utf-8");
$data = $_POST['data'];  


//删除用户登录信息
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
for ($i=0;$i<count($data);$i++)
{
	$sql="DELETE FROM classification_settings WHERE classification_id='".$data[$i]."'";
	$arr[]=mysql_query($sql);
}
echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常*/
mysql_close($con);


?>
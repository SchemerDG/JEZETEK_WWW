<?php
header("Content-type: text/html; charset=utf-8");
$data = $_POST['update_classification_settings'];  

$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$sql="update classification_settings SET classification_name='".$data['classname']."',classification_explain='".$data['classinstruction']."' WHERE classification_id='".$data['id']."'";
$arr[]=mysql_query($sql);
$arr[]='1';
$sql="DELETE FROM classification_settings_manager WHERE classification_id='".$data['id']."'";
mysql_query($sql);
if(!empty($data['managers']))
{
	for ($i=0;$i<count($data['managers']);$i++)
	{
		$sql="INSERT INTO classification_settings_manager(classification_id, manager_id) VALUES ('".$data['id']."','".$data['managers'][$i]['id']."')";
		$arr[]=mysql_query($sql);
	}
}
$arr[]='2';
$sql="DELETE FROM classification_settings_member WHERE classification_id='".$data['id']."'";
$arr[]=mysql_query($sql);
if(!empty($data['members']))
{
	for ($i=0;$i<count($data['members']);$i++)
	{
		$sql="INSERT INTO classification_settings_member(classification_id, member_id) VALUES ('".$data['id']."','".$data['members'][$i]['id']."')";
		$arr[]=mysql_query($sql);
	}
}
$arr[]='3';
$sql="DELETE FROM classification_settings_reader WHERE classification_id='".$data['id']."'";
$arr[]=mysql_query($sql);
if(!empty($data['readers']))
{
	for ($i=0;$i<count($data['readers']);$i++)
	{
		$sql="INSERT INTO classification_settings_reader(classification_id, reader_id) VALUES ('".$data['id']."','".$data['readers'][$i]['id']."')";
		$arr[]=mysql_query($sql);
	}
}

$arr[]='OK';
echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常*/
mysql_close($con);
?>
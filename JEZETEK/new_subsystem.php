<?php
header("Content-type: text/html; charset=utf-8");
$subsystem_name = $_POST['subsystem_name'];  

//插入用户登录信息
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$sql="INSERT INTO subsystems(subsystems_name) VALUES ('".$subsystem_name."')";
mysql_query($sql);

///输出
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
		array_push($children['children'],$chidren_1);
	}
	array_push($arr['children'],$children);
}


$sql="SELECT * FROM units";
$check_query = mysql_query($sql);
while($result=mysql_fetch_array($check_query))
{
	if($result['subsystems_id']=='')
	{
		$children['name']=$result['unit_name'];
		$children['id']=$result['unit_id'];
		$children['children']=array();
		$children['type']='unit';
		array_push($arr['children'],$children);
	}
}
echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常
mysql_close($con);

?>
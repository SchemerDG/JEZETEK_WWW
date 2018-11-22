<?php
header("Content-type: text/html; charset=utf-8");
$data = $_POST['inputmsg'];  
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
$arr=array();
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
$sql="SELECT * FROM classification_settings";
$check_query = mysql_query($sql);
while($result=mysql_fetch_array($check_query))
{	
	$arr['id']=$result['classification_id'];
	$arr['classname']=$result['classification_name'];
	$arr['classinstruction']=$result['classification_explain'];
	$arr['engineeringnum']=$result['engineering_num'];
	
	$sql="SELECT * FROM classification_settings_manager where classification_id='".$result['classification_id']."'";
	$check_query1 = mysql_query($sql);
	$arr['managers']=array();
	$i=0;
	while($result1=mysql_fetch_array($check_query1))
	{	
		$arr['managers'][$i]['id']=$result1['manager_id'];
		$sql="SELECT * FROM LOGIN_USER where user_id='".$result1['manager_id']."'";
		$check_query2 = mysql_query($sql);
		if($result2=mysql_fetch_array($check_query2))
		{
			$arr['managers'][$i]['name']=$result2['USER_NAME'];
			$result2=array();
		}
		$result1=array();
		$i++;
	}
	unset($check_query1);
	
	$sql="SELECT * FROM classification_settings_member where classification_id='".$result['classification_id']."'";
	$check_query1 = mysql_query($sql);
	$arr['members']=array();
	$i=0;
	while($result1=mysql_fetch_array($check_query1))
	{	
		$arr['members'][$i]['id']=$result1['member_id'];
		$sql="SELECT * FROM LOGIN_USER where user_id='".$result1['member_id']."'";
		$check_query2 = mysql_query($sql);
		if($result2=mysql_fetch_array($check_query2))
		{
			$arr['members'][$i]['name']=$result2['USER_NAME'];
			$result2=array();
		}
		$result1=array();
		$i++;
	}
	unset($check_query1);
	
	$sql="SELECT * FROM classification_settings_reader where classification_id='".$result['classification_id']."'";
	$check_query1 = mysql_query($sql);
	$arr['readers']=array();
	$i=0;
	while($result1=mysql_fetch_array($check_query1))
	{	
		$arr['readers'][$i]['id']=$result1['reader_id'];
		$sql="SELECT * FROM LOGIN_USER where user_id='".$result1['reader_id']."'";
		$check_query2 = mysql_query($sql);
		if($result2=mysql_fetch_array($check_query2))
		{
			$arr['readers'][$i]['name']=$result2['USER_NAME'];
			$result2=array();
		}
		$result1=array();
		$i++;
	}
	unset($check_query1);
	
	$arr1[]=$arr;	
	$arr=array();
	$result=array();
}
if(!empty($data))
{
	if(!empty($arr1))
	{
		for($i=0;$i<count($arr1);$i++)
		{
			if(strpos($arr1[$i]['classname'],$data)!==false)
			{
				$arr2[]=$arr1[$i];
			}
		}
	}	
}
else
{
	
	$arr2=$arr1;
}

echo json_encode($arr2);//要增加中括号，否则数据格式前端解析不正常
mysql_close($con);


?>
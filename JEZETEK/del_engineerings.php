<?php
header("Content-type: text/html; charset=utf-8");
$id = $_POST['eng_id']; 
$data=$_POST['classification_id'];
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$sql="DELETE FROM engineerings WHERE engineering_id='".$id."'";
mysql_query($sql);
$sql="DELETE FROM engineering_data WHERE engineering_id='".$id."'";
mysql_query($sql);
$sql="DELETE FROM engineering_log WHERE engineering_id='".$id."'";
mysql_query($sql);
$sql="DELETE FROM engineering_used_virtual_device WHERE engineering_id='".$id."'";
mysql_query($sql);
$sql="DELETE FROM engineering_user_canuse WHERE engineering_id='".$id."'";
mysql_query($sql);
$sql="DELETE FROM engineerings_members WHERE engineering_id='".$id."'";
mysql_query($sql);

//输出
$arr=array();
if($data==-1)
{
	$sql="SELECT * FROM engineerings where 1";
}
else
{
	$sql="SELECT * FROM engineerings where classification_id='".$data."'";
}

$check_query = mysql_query($sql);
while($result=mysql_fetch_array($check_query))
{
	$children['id']=$result['engineering_id'];
	$children['proname']=$result['engineering_name'];
	$children['classification_id']=$result['classification_id'];
	
		$sql="SELECT * FROM classification_settings where classification_id='".$result['classification_id']."'";
		$check_query2 = mysql_query($sql);
		if($result2=mysql_fetch_array($check_query2))
		{
			$children['category']=$result2['classification_name'];
			$result2=array();
		}
		$result1=array();
		
	$children['version']="v".$result['version'];
	$children['statime']=$result['build_time'];
	$children['alttime']=$result['change_time'];
	$children['designer']=$result['main_designer_id'];
	
		$sql="SELECT * FROM LOGIN_USER where user_id='".$result['main_designer_id']."'";
		$check_query2 = mysql_query($sql);
		if($result2=mysql_fetch_array($check_query2))
		{
			$children['main_designer_name']=$result2['USER_NAME'];
			$result2=array();
		}
		$result1=array();
		
	$children['status_id']=$result['status_id'];
		$sql="SELECT * FROM engineering_status where engineering_status_id='".$result['status_id']."'";
		$check_query2 = mysql_query($sql);
		if($result2=mysql_fetch_array($check_query2))
		{
			$children['status']=$result2['engineering_status'];
			$result2=array();
		}
		$result1=array();
	
		$sql="SELECT * FROM engineerings_members where engineering_id='".$result['engineering_id']."'";
		$check_query2 = mysql_query($sql);
		$i=0;
		$children['member']=array();
		while($result2=mysql_fetch_array($check_query2))
		{
			$children['member'][$i]['id']=$result2['user_id'];
			$sql="SELECT * FROM LOGIN_USER where user_id='".$result2['user_id']."'";
			$check_query3= mysql_query($sql);
			if($result3=mysql_fetch_array($check_query3))
			{
				$children['member'][$i]['name']=$result3['USER_NAME'];
				$result2=array();
			}
			$i++;
			$result2=array();
		}
		$result1=array();
	
	array_push($arr,$children);
}
echo json_encode($arr);
mysql_close($con);
?>
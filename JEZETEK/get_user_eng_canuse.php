<?php
header("Content-type: text/html; charset=utf-8");
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

@session_start();
$user_id=$_SESSION['userid'];
session_write_close() ;
$arr=array();
$children=array();
$sql="SELECT * FROM engineering_user_canuse where user_id='".$user_id."'";
$check_query = mysql_query($sql);
while($result=mysql_fetch_array($check_query))
{
	 $sql1="SELECT * FROM engineerings where engineering_id='".$result['engineering_id']."'";
	 $check_query1 = mysql_query($sql1);
	 if($result1=mysql_fetch_array($check_query1))
	 {
		$children['id']=$result1['engineering_id'];
		$children['name']=$result1['engineering_name'];
		$children['version']=$result1['version'];
		$children['description']=$result1['description'];
		array_push($arr,$children);
	 }
}
echo json_encode($arr);
mysql_close($con);
?>
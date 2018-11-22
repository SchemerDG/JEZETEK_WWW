<?php
header("Content-type: text/html; charset=utf-8");
$username = $_POST['userName'];  
$password = $_POST['passWord'];
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
$arr=array();
mysql_select_db("JEZETEK", $con);
$sql="SELECT * FROM LOGIN_USER where user_id='$username' and user_password='$password'";
$check_query = mysql_query($sql);
if($result=mysql_fetch_array($check_query))
{
	if($result['USER_STATUE']==1)
	{	
		$arr["user_name"]=$result['USER_NAME'];
		$arr["user_id"]=$result['USER_ID'];
		$arr["login_status"]="true";
		@session_start();
		$_SESSION['username'] = $result['USER_NAME'];
		$_SESSION['userid'] = $result['USER_ID'];
		session_write_close();
		echo json_encode($arr);
	}
	else
	{
		$arr=array();
		$arr["user_name"]=$result[''];
		$arr["user_id"]=$result[''];
		$arr["login_status"]="false";
		echo json_encode($arr);
	}
}
else
{
	$arr=array();
	$arr["user_name"]=$result[''];
	$arr["user_id"]=$result[''];
	$arr["login_status"]="false";
	echo json_encode($arr);
}
mysql_close($con);
?>
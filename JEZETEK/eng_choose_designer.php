<?php
	header("Content-type: text/html; charset=utf-8");
$data = $_POST['whichbtn'];  
$id=$_POST['id'];  
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
$arr=array();
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$sql="SELECT * FROM classification_settings_member where classification_id='".$id."'";
$check_query = mysql_query($sql);
switch($data)
{
	case 'choose_designer':
		while($result=mysql_fetch_array($check_query))
		{
			$children['userid']=$result['member_id'];
			$sql="SELECT * FROM LOGIN_USER where user_id='".$result['member_id']."'";
			$check_query2 = mysql_query($sql);
			if($result2=mysql_fetch_array($check_query2))
			{
				$children['username']=$result2['USER_NAME'];
				$result2=array();
			}
			$arr[]=$children;
		}
	break;
}
//插入新分类设置信息
echo json_encode($arr);
mysql_close($con);
?>
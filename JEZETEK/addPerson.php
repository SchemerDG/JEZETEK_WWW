<?php
	header("Content-type: text/html; charset=utf-8");
$data = $_POST['whichbtn'];  
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
$arr=array();
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
$sql="SELECT * FROM user_limit where engineering_design='1'";
$check_query = mysql_query($sql);
$i=0;
while($result=mysql_fetch_array($check_query))
{
	$arr[$i]['userid']=$result['user_id'];
	$sql="SELECT * FROM LOGIN_USER where user_id='".$result['user_id']."'";
	$check_query2 = mysql_query($sql);
	if($result2=mysql_fetch_array($check_query2))
	{
		$arr[$i]['username']=$result2['USER_NAME'];
		$result2=array();
	}
	$result=array();
	$i++;
}
/*switch($data)
{
	case 'manager':
		$i=0;
		while($result=mysql_fetch_array($check_query))
		{
			if($result['classification_manage_limit']==1)
			{
				$arr[$i]['userid']=$result['user_id'];
				$sql="SELECT * FROM LOGIN_USER where user_id='".$result['user_id']."'";
				$check_query2 = mysql_query($sql);
				if($result2=mysql_fetch_array($check_query2))
				{
					$arr[$i]['username']=$result2['USER_NAME'];
					$result2=array();
				}
				$result=array();
				$i++;
			}
		}
		break;
	case 'member':
		$i=0;
		while($result=mysql_fetch_array($check_query))
		{
			if($result['main_designer_limit']==1||$result['together_designer_limit']==1)
			{
				$arr[$i]['userid']=$result['user_id'];
				$sql="SELECT * FROM LOGIN_USER where user_id='".$result['user_id']."'";
				$check_query2 = mysql_query($sql);
				if($result2=mysql_fetch_array($check_query2))
				{
					$arr[$i]['username']=$result2['USER_NAME'];
					$result2=array();
				}
				$result=array();
				$i++;
			}
		}
		break;
	case 'reader':
		$i=0;
		while($result=mysql_fetch_array($check_query))
		{
			if($result['classification_read_limit']==1)
			{
				$arr[$i]['userid']=$result['user_id'];
				$sql="SELECT * FROM LOGIN_USER where user_id='".$result['user_id']."'";
				$check_query2 = mysql_query($sql);
				if($result2=mysql_fetch_array($check_query2))
				{
					$arr[$i]['username']=$result2['USER_NAME'];
					$result2=array();
				}
				$result=array();
				$i++;
			}
		}
		break;
}*/
//插入新分类设置信息

echo json_encode($arr);
mysql_close($con);
?>
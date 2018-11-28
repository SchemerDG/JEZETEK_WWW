<?php
header("Content-type: text/html; charset=utf-8");

$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

//输出
$arr=array();
$arr['name']='DEVISER组态工作栈管理系统';
$arr['icon']='总系统';
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
		//图标
		if($result1['power_status']=='已上电'&&$result1['connect_method']=='TCP/IP')
		{
			$chidren_1['icon']="TCP通讯_已上电";
		}
		elseif($result1['power_status']=='已上电'&&$result1['connect_method']=='USB')
		{
			$chidren_1['icon']='USB通讯_已上电';
		}
		elseif($result1['power_status']=='已上电'&&$result1['connect_method']=='CAN')
		{
			$chidren_1['icon']='CAN通讯_已上电';
		}
		elseif($result1['power_status']=='未上电'&&$result1['connect_method']=='CAN')
		{
			$chidren_1['icon']='CAN通讯_未上电';
		}
		// elseif($result1['power_status']=='未上电'&&$result1['connect_method']!='CAN')
		// {
		// 	$chidren_1['icon']='未上电';
		// }
		elseif($result1['power_status']=='已离线')
		{
			$chidren_1['icon']='已离线';
		}

		$chidren_1['children']=array();
		$sql2="SELECT * FROM devices where unit_id='".$result1['unit_id']."'";
		$check_query2 = mysql_query($sql2);
		while($result2=mysql_fetch_array($check_query2))
		{
			$children_2['id']=$result2['device_id'];
			$children_2['name']=$result2['device_name'];
			$children_2['type']='device';
			$children_2['all_num']='';
			$children_2['chno']=$result2['chno'];
			//图标
			if($result2['power_status']=='已上电'&&$result2['connect_method']=='TCP/IP')
			{
				$children_2['icon']="TCP通讯_已上电";
			}
			elseif($result2['power_status']=='已上电'&&$result2['connect_method']=='USB')
			{
				$children_2['icon']='USB通讯_已上电';
			}
			elseif($result2['power_status']=='已上电'&&$result2['connect_method']=='CAN')
			{
				$children_2['icon']='CAN通讯_已上电';
			}
			elseif($result2['power_status']=='未上电'&&$result2['connect_method']=='CAN')
			{
				$children_2['icon']='CAN通讯_未上电';
			}
			// elseif($result2['power_status']=='未上电'&&$result2['connect_method']!='CAN')
			// {
			// 	$children_2['icon']='未上电';
			// }
			elseif($result2['power_status']=='已离线')
			{
				$children_2['icon']='已离线';
			}
			array_push($chidren_1['children'],$children_2);
		}
		array_push($children['children'],$chidren_1);
	}
	array_push($arr['children'],$children);
}


$sql1="SELECT * FROM units";
$check_query1 = mysql_query($sql1);
while($result1=mysql_fetch_array($check_query1))
{
	if($result1['subsystems_id']=='')
	{
		$chidren_1['id']=$result1['unit_id'];
		$chidren_1['name']=$result1['unit_name'];
		$chidren_1['type']='unit';
		///图标
		if($result1['power_status']=='已上电'&&$result1['connect_method']=='TCP/IP')
		{
			$chidren_1['icon']="TCP通讯_已上电";
		}
		elseif($result1['power_status']=='已上电'&&$result1['connect_method']=='USB')
		{
			$chidren_1['icon']='USB通讯_已上电';
		}
		elseif($result1['power_status']=='已上电'&&$result1['connect_method']=='CAN')
		{
			$chidren_1['icon']='CAN通讯_已上电';
		}
		elseif($result1['power_status']=='未上电'&&$result1['connect_method']=='CAN')
		{
			$chidren_1['icon']='CAN通讯_未上电';
		}
		// elseif($result1['power_status']=='未上电'&&$result1['connect_method']!='CAN')
		// {
		// 	$chidren_1['icon']='未上电';
		// }
		elseif($result1['power_status']=='已离线')
		{
			$chidren_1['icon']='已离线';
		}

		$chidren_1['children']=array();
		$sql2="SELECT * FROM devices where unit_id='".$result1['unit_id']."'";
		$check_query2 = mysql_query($sql2);
		while($result2=mysql_fetch_array($check_query2))
		{
			$children_2['id']=$result2['device_id'];
			$children_2['name']=$result2['device_name'];
			$children_2['type']='device';
			$children_2['all_num']='';
			$children_2['chno']=$result2['chno'];
			//图标
			if($result2['power_status']=='已上电'&&$result2['connect_method']=='TCP/IP')
			{
				$children_2['icon']="TCP通讯_已上电";
			}
			elseif($result2['power_status']=='已上电'&&$result2['connect_method']=='USB')
			{
				$children_2['icon']='USB通讯_已上电';
			}
			elseif($result2['power_status']=='已上电'&&$result2['connect_method']=='CAN')
			{
				$children_2['icon']='CAN通讯_已上电';
			}
			elseif($result2['power_status']=='未上电'&&$result2['connect_method']=='CAN')
			{
				$children_2['icon']='CAN通讯_未上电';
			}
			// elseif($result2['power_status']=='未上电'&&$result2['connect_method']!='CAN')
			// {
			// 	$children_2['icon']='未上电';
			// }
			elseif($result2['power_status']=='已离线')
			{
				$children_2['icon']='已离线';
			}
			array_push($chidren_1['children'],$children_2);
		}
		array_push($arr['children'],$chidren_1);
	}
}
echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常
mysql_close($con);

?>

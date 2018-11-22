<?php
header("Content-type: text/html; charset=utf-8");
$user_id = $_POST['userid'];  
$data1 = $_POST['itemName'];  
$arr=array();
$con = mysql_connect("localhost","root","localhost");
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
switch($data1)
{
	case '管理报表':
		$arr=array();
		$arr['open']=true;
		$arr['nocheck']=true;
		$arr['isParent']=true;
		$arr['name']='所有报表';
		$arr['children']=array();
		break;
	case '阅读报表':
		$arr=array();
		$arr['open']=true;
		$arr['isParent']=true;
		$arr['nocheck']=true;
		$arr['name']='所有报表';
		$arr['children']=array();
		break;
	case '下载转发':
		$arr=array();
		$arr['open']=true;
		$arr['isParent']=true;
		$arr['nocheck']=true;
		$arr['name']='所有报表';
		$arr['children']=array();
		break;
	case '工程管理':
		$arr=array();
		$arr['open']=true;
		$arr['isParent']=true;
		$arr['nocheck']=true;
		$children=array();
		$arr['name']='所有分类';
		$arr['children']=array();
		$con = mysql_connect("localhost","root","localhost");
		if (!$con)
		{
		die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("JEZETEK", $con);
		mysql_query("set names utf8");
		$sql="SELECT * FROM classification_settings where 1";
		$check_query = mysql_query($sql);
		$i=0;
		while($result=mysql_fetch_array($check_query))
		{
			$children[$i]['id']=$result['classification_id'];
			$children[$i]['name']=$result['classification_name'];
			$sql1="SELECT * FROM engineering_manage_limit where user_id='".$user_id."' and class_id='".$result['classification_id']."'";
			$check_query1 = mysql_query($sql1);
			if($result1=mysql_fetch_array($check_query1))
			{
				$children[$i]['checked']=true;
			}
			else
			{
				$children[$i]['checked']=false;
			}
			
			$i++;
		}
		$arr['children']=$children;
		mysql_close($con);
		
		break;
	case '工程设计':
		$arr=array();
		$arr['open']=true;
		$arr['nocheck']=true;
		$arr['isParent']=true;
		$arr['name']='DEVISER组态工作栈管理系统';
		$arr['children']=array();
		$con = mysql_connect("localhost","root","localhost");
		if (!$con)
		{
		die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("JEZETEK", $con);
		mysql_query("set names utf8");
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
				$chidren_1['children']=array();
				$sql2="SELECT * FROM devices where unit_id='".$result1['unit_id']."'";
				$check_query2 = mysql_query($sql2);
				while($result2=mysql_fetch_array($check_query2))
				{
					$chidren_2['id']=$result2['device_id'];
					$chidren_2['name']=$result2['device_name'];
					$chidren_2['type']='device';
					$chidren_2['all_num']='';
					$chidren_2['chno']=$result2['chno'];
					$sql3="SELECT * FROM engineering_design_device_limit where user_id='".$user_id."' and 	device_id='".$result2['device_id']."'";
					$check_query3 = mysql_query($sql3);
					if(mysql_fetch_array($check_query3))
					{
						$children2['checked']=true;
					}
					else
					{
						$children2['checked']=false;
					}
					array_push($chidren_1['children'],$chidren_2);
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
				$children1['name']=$result1['unit_name'];
				$children1['id']=$result1['unit_id'];
				$children1['children']=array();
				$children1['type']='unit';
				$sql2="SELECT * FROM devices where unit_id='".$result1['unit_id']."'";
				$check_query2 = mysql_query($sql2);
				while($result2=mysql_fetch_array($check_query2))
				{
					$chidren_2['id']=$result2['device_id'];
					$chidren_2['name']=$result2['device_name'];
					$chidren_2['type']='device';
					$chidren_2['all_num']='';
					$chidren_2['chno']=$result2['chno'];
					$sql3="SELECT * FROM engineering_design_device_limit where user_id='".$user_id."' and device_id='".$result2['device_id']."'";
					$check_query3 = mysql_query($sql3);
					if($result3=mysql_fetch_array($check_query3))
					{
						$children2['checked']=true;
					}
					else
					{
						$children2['checked']=false;
					}
					array_push($chidren_1['children'],$chidren_2);
				}
				array_push($arr['children'],$children1);
			}
		}
		mysql_close($con);
		break;
	case '工程审批':
		$arr=array();
		$arr['open']=true;
		$arr['nocheck']=true;
		$arr['isParent']=true;
		$children=array();
		$arr['name']='所有分类';
		$arr['children']=array();
		$con = mysql_connect("localhost","root","localhost");
		if (!$con)
		{
		die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("JEZETEK", $con);
		mysql_query("set names utf8");
		$sql="SELECT * FROM classification_settings where 1";
		$check_query = mysql_query($sql);
		$i=0;
		while($result=mysql_fetch_array($check_query))
		{
			
			$children[$i]['id']=$result['classification_id'];
			$children[$i]['name']=$result['classification_name'];
			$sql1="SELECT * FROM engineering_approval_limit where user_id='".$user_id."' and class_id='".$result['classification_id']."'";
			$check_query2 = mysql_query($sql1);
			if($result2=mysql_fetch_array($check_query2))
			{
				$children[$i]['checked']=true;
			}
			else
			{
				$children[$i]['checked']=false;
			}
			$i++;
		}
		$arr['children']=$children;
		mysql_close($con);
		break;
	case '工程配置':
		$arr=array();
		$arr['open']=true;
		$arr['nocheck']=true;
		$arr['isParent']=true;
		$arr['name']='DEVISER组态工作栈管理系统';
		$arr['children']=array();
		$con = mysql_connect("localhost","root","localhost");
		if (!$con)
		{
		die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("JEZETEK", $con);
		mysql_query("set names utf8");
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
				$chidren_1['children']=array();
				$sql2="SELECT * FROM devices where unit_id='".$result1['unit_id']."'";
				$check_query2 = mysql_query($sql2);
				while($result2=mysql_fetch_array($check_query2))
				{
					$chidren_2['id']=$result2['device_id'];
					$chidren_2['name']=$result2['device_name'];
					$chidren_2['type']='device';
					$chidren_2['all_num']='';
					$chidren_2['chno']=$result2['chno'];
					$sql3="SELECT * FROM engineering_config_limit where user_id='".$user_id."' and device_id='".$result2['device_id']."'";
					$check_query3 = mysql_query($sql3);
					if($result3=mysql_fetch_array($check_query3))
					{
						$children2['checked']=true;
					}
					else
					{
						$children2['checked']=false;
					}
					array_push($chidren_1['children'],$chidren_2);
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
				$children1['name']=$result1['unit_name'];
				$children1['id']=$result1['unit_id'];
				$children1['children']=array();
				$children1['type']='unit';
				$sql2="SELECT * FROM devices where unit_id='".$result1['unit_id']."'";
				$check_query2 = mysql_query($sql2);
				while($result2=mysql_fetch_array($check_query2))
				{
					$chidren_2['id']=$result2['device_id'];
					$chidren_2['name']=$result2['device_name'];
					$chidren_2['type']='device';
					$chidren_2['all_num']='';
					$chidren_2['chno']=$result2['chno'];
					$sql3="SELECT * FROM engineering_config_limit where user_id='".$user_id."' and device_id='".$result2['device_id']."'";
					$check_query3 = mysql_query($sql3);
					if($result3=mysql_fetch_array($check_query3))
					{
						$children2['checked']=true;
					}
					else
					{
						$children2['checked']=false;
					}
					array_push($chidren_1['children'],$chidren_2);
				}
				array_push($arr['children'],$children1);
			}
		}
		mysql_close($con);
		break;
	case '用户查阅':
		$arr=array();
		$arr['open']=true;
		$arr['nocheck']=true;
		$arr['isParent']=true;
		$children=array();
		$arr['name']='所有用户';
		$arr['children']=array();
		$con = mysql_connect("localhost","root","localhost");
		if (!$con)
		{
		die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("JEZETEK", $con);
		mysql_query("set names utf8");
		$sql="SELECT * FROM login_user where 1";
		$check_query = mysql_query($sql);
		$i=0;
		while($result=mysql_fetch_array($check_query))
		{
			
			$children[$i]['id']=$result['USER_ID'];
			$children[$i]['name']=$result['USER_NAME'];
			$sql1="SELECT * FROM user_read_limit where user_id='".$user_id."' and user_id_x='".$result['USER_ID']."'";
			$check_query1 = mysql_query($sql1);
			if($result1=mysql_fetch_array($check_query1))
			{
				$children[$i]['checked']=true;
			}
			else
			{
				$children[$i]['checked']=false;
			}
			$i++;
		}
		$arr['children']=$children;
		mysql_close($con);
		break;
	case '设备信息':
		$arr=array();
		$arr['open']=true;
		$arr['nocheck']=true;
		$arr['isParent']=true;
		$arr['name']='DEVISER组态工作栈管理系统';
		$arr['children']=array();
		$con = mysql_connect("localhost","root","localhost");
		if (!$con)
		{
		die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("JEZETEK", $con);
		mysql_query("set names utf8");
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
				$chidren_1['children']=array();
				$sql2="SELECT * FROM devices where unit_id='".$result1['unit_id']."'";
				$check_query2 = mysql_query($sql2);
				while($result2=mysql_fetch_array($check_query2))
				{
					$chidren_2['id']=$result2['device_id'];
					$chidren_2['name']=$result2['device_name'];
					$chidren_2['type']='device';
					$chidren_2['all_num']='';
					$chidren_2['chno']=$result2['chno'];
					$sql3="SELECT * FROM device_information_limit where user_id='".$user_id."' and device_id='".$result2['device_id']."'";
					$check_query3 = mysql_query($sql3);
					if($result3=mysql_fetch_array($check_query3))
					{
						$children2['checked']=true;
					}
					else
					{
						$children2['checked']=false;
					}
					array_push($chidren_1['children'],$chidren_2);
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
				$children1['name']=$result1['unit_name'];
				$children1['id']=$result1['unit_id'];
				$children1['children']=array();
				$children1['type']='unit';
				$sql2="SELECT * FROM devices where unit_id='".$result1['unit_id']."'";
				$check_query2 = mysql_query($sql2);
				while($result2=mysql_fetch_array($check_query2))
				{
					$chidren_2['id']=$result2['device_id'];
					$chidren_2['name']=$result2['device_name'];
					$chidren_2['type']='device';
					$chidren_2['all_num']='';
					$chidren_2['chno']=$result2['chno'];
					$sql3="SELECT * FROM device_information_limit where user_id='".$user_id."' and device_id='".$result2['device_id']."'";
					$check_query3 = mysql_query($sql3);
					if($result3=mysql_fetch_array($check_query3))
					{
						$children2['checked']=true;
					}
					else
					{
						$children2['checked']=false;
					}
					array_push($chidren_1['children'],$chidren_2);
				}
				array_push($arr['children'],$children1);
			}
		}
		mysql_close($con);
		break;
	case '日志查阅':
		$arr=array();
		$arr['open']=true;
		$arr['nocheck']=true;
		$arr['isParent']=true;
		$arr['name']='所有日志';
		$arr['children']=array();
		
		break;
	default:;
}
echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常



?>
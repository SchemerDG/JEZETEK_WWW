<?php
header("Content-type: text/html; charset=utf-8");
$data0 = $_POST['user'];  
$data1 = $_POST['permitionList'];  
$data2 = $_POST['userid'];  

$user_last_id=$data2;


$user_id=$data0['loginId'];

$user_name=$data0['username'];
$user_password=$data0['password'];

$user_no=$data0['userid'];
$user_department=$data0['department'];
$user_duty=$data0['position'];
foreach ($data1 as $value) {
	switch ($value['name'])
	{
	case '系统登陆':
		foreach ($value['children'] as $value1) {
			switch($value1['name'])
			{
				case '允许登陆':
					if ($value1['checked']=='true')
					{
						$login_allow=1;
					}
					else
					{
						$login_allow=0;
					}
					break;
				case '远程登陆':
					if ($value1['checked']=='true')
					{
						$telnet_login_allow_limit=1;
					}
					else
					{
						$telnet_login_allow_limit=0;
					}
				case '远程登陆 ':
					if ($value1['checked']=='true')
					{
						$telnet_login_allow_unlimit=1;
					}
					else
					{
						$telnet_login_allow_unlimit=0;
					}
					break;
				case 'IP绑定':
					if ($value1['checked']=='true')
					{
						$ip_bind=1;
						$ip_bind_data='';
					}
					else
					{
						$ip_bind=0;
						$ip_bind_data='';
					}
					break;
				
				case '手机绑定':
					if ($value1['checked']=='true')
					{
						$phone_mac_bind=1;
						$phone_mac_bind_data='';
					}
					else
					{
						$phone_mac_bind=0;
						$phone_mac_bind_data='';
					}
					break;
				case 'PC绑定':
					if ($value1['checked']=='true')
					{
						$pc_mac_bind=1;
						$pc_mac_bind_data='';
					}
					else
					{
						$pc_mac_bind=0;
						$pc_mac_bind_data='';
					}
					break;		
				default:;
			}
		}
		break;
	case '通知提醒':
		foreach ($value['children'] as $value1) {
			switch($value1['name'])
			{
				case '管理公告':
					if ($value1['checked']=='true')
					{
						$Announcement_manage=1;
					}
					else
					{
						$Announcement_manage=0;
					}
					break;
				case '发布公告':
					if ($value1['checked']=='true')
					{
						$anouncement_send=1;
					}
					else
					{
						$anouncement_send=0;
					}
					break;
				
				case '阅读公告':
					if ($value1['checked']=='true')
					{
						$anouncement_read=1;
					}
					else
					{
						$anouncement_read=0;
					}
					break;
				case '发出通知':
					if ($value1['checked']=='true')
					{
						$notice_send=1;
					}
					else
					{
						$notice_send=0;
					}
					break;		
				default:;
			}
		}
		break;
	case '报表统计':
	foreach ($value['children'] as $value1) {
			switch($value1['name'])
			{
				case '管理报表':
					if ($value1['checked']=='true')
					{
						$report_manage=1;
					}
					else
					{
						$report_manage=0;
					}
					break;
				case '报表录入':
					if ($value1['checked']=='true')
					{
						$report_input=1;
					}
					else
					{
						$report_input=0;
					}
					break;
				
				case '阅读报表':
					if ($value1['checked']=='true')
					{
						$report_read=1;
					}
					else
					{
						$report_read=0;
					}
					break;
				case '下载转发':
					if ($value1['checked']=='true')
					{
						$report_download=1;
					}
					else
					{
						$report_download=0;
					}
					break;		
				default:;
			}
		}
		break;
	case '工程设置':
		foreach ($value['children'] as $value1) {
			switch($value1['name'])
			{
				case '工程管理':
					if ($value1['checked']=='true')
					{
						$engineering_manage=1;
					}
					else
					{
						$engineering_manage=0;
					}
					break;
				case '分类设置':
					if ($value1['checked']=='true')
					{
						$classification_settings=1;
					}
					else
					{
						$classification_settings=0;
					}
					break;
				
				case '工程设计':
					if ($value1['checked']=='true')
					{
						$engineering_design=1;
					}
					else
					{
						$engineering_design=0;
					}
					break;
				case '工程审批':
					if ($value1['checked']=='true')
					{
						$engineering_approval=1;
					}
					else
					{
						$engineering_approval=0;
					}
					break;		
				case '工程配置':
					if ($value1['checked']=='true')
					{
						$engineering_execute=1;
					}
					else
					{
						$engineering_execute=0;
					}
					break;	
				default:;
			}
		}
		break;
	case '用户管理':
		foreach ($value['children'] as $value1) {
			switch($value1['name'])
			{
				case '用户查阅':
					if ($value1['checked']=='true')
					{
						$user_read=1;
					}
					else
					{
						$user_read=0;
					}
					break;		
				case '用户管理':
					if ($value1['checked']=='true')
					{
						$user_manage=1;
					}
					else
					{
						$user_manage=0;
					}
					break;	
				default:;
			}
		}
		break;
	case '监控管理':
		foreach ($value['children'] as $value1) {
			switch($value1['name'])
			{
				case '设备监控':
					if ($value1['checked']=='true')
					{
						$device_monitoring=1;
					}
					else
					{
						$device_monitoring=0;
					}
					break;		
				case '状态监控':
					if ($value1['checked']=='true')
					{
						$status_monitoring=1;
					}
					else
					{
						$status_monitoring=0;
					}
					break;	
				case '人员监控':
					if ($value1['checked']=='true')
					{
						$person_monitoring=1;
					}
					else
					{
						$person_monitoring=0;
					}
					break;
				default:;
			}
		}
		break;
	case '系统架构':
		foreach ($value['children'] as $value1) {
			switch($value1['name'])
			{
				case '设备信息':
					if ($value1['checked']=='true')
					{
						$device_information=1;
					}
					else
					{
						$device_information=0;
					}
					break;		
				case '注册管理':
					if ($value1['checked']=='true')
					{
						$registration_manage=1;
					}
					else
					{
						$registration_manage=0;
					}
					break;	
				default:;
			}
		}
		break;
	case '系统日志':
		foreach ($value['children'] as $value1) {
			switch($value1['name'])
			{
				case '日志查阅':
					if ($value1['checked']=='true')
					{
						$log_read=1;
					}
					else
					{
						$log_read=0;
					}
					break;		
				case '日志导出':
					if ($value1['checked']=='true')
					{
						$log_download=1;
					}
					else
					{
						$log_download=0;
					}
					break;	
				default:;
			}
		}
		break;
	case '系统设置':
		foreach ($value['children'] as $value1) {
			switch($value1['name'])
			{
				case '核心设置':
					if ($value1['checked']=='true')
					{
						$core_config=1;
					}
					else
					{
						$core_config=0;
					}
					break;		
				case '访问控制':
					if ($value1['checked']=='true')
					{
						$access_control=1;
					}
					else
					{
						$access_control=0;
					}
					break;	
				case '安全设置':
					if ($value1['checked']=='true')
					{
						$safy_config=1;
					}
					else
					{
						$safy_config=0;
					}
					break;
				case '系统账套':
					if ($value1['checked']=='true')
					{
						$system_account=1;
					}
					else
					{
						$system_account=0;
					}
					break;
				default:;
			}
		}
		break;
	default:;	
	}
}



//保存用户登录信息
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
$sql="UPDATE login_user SET ".
"USER_NAME='".$user_name."',".
"USER_ID='".$user_id."',".
"USER_PASSWORD='".$user_password."',".
"USER_STATUE=1 WHERE USER_ID='".$user_last_id."'";
mysql_query($sql);


//保存用户基本信息
$sql="UPDATE user_information SET ".
"user_no='".$user_no."',".
"user_department='".$user_department."',".
"user_duty='".$user_duty."',".
"user_id='".$user_id."' WHERE USER_ID='".$user_last_id."'";
mysql_query($sql);


//插入用户权限信息
$sql="UPDATE user_limit SET ". 
"user_id='".$user_id."',".
"login_allow='".$login_allow."',".
"telnet_login_allow_limit='".$telnet_login_allow_limit."',".
"telnet_login_allow_unlimit='".$telnet_login_allow_unlimit."',".
"phone_mac_bind='".$phone_mac_bind."',".
"pc_mac_bind='".$pc_mac_bind."',".
"ip_bind='".$ip_bind."',".
"phone_mac_bind_data='".$phone_mac_bind_data."',".
"pc_mac_bind_data='".$pc_mac_bind_data."',".
"ip_bind_data='".$ip_bind_data."',".
"Announcement_manage='".$Announcement_manage."',".
"anouncement_send='".$anouncement_send."',".
"anouncement_read='".$anouncement_read."',".
"notice_send='".$notice_send."',".
"report_manage='".$report_manage."',".
"report_input='".$report_input."',".
"report_read='".$report_read."',".
"report_download='".$report_download."',".
"engineering_manage='".$engineering_manage."',".
"classification_settings='".$classification_settings."',".
"engineering_design='".$engineering_design."',".
"engineering_approval='".$engineering_approval."',".
"engineering_execute='".$engineering_execute."',".
"user_read='".$user_read."',".
"user_manage='".$user_manage."',".
"device_monitoring='".$device_monitoring."',".
"status_monitoring='".$status_monitoring."',".
"person_monitoring='".$person_monitoring."',".
"device_information='".$device_information."',".
"registration_manage='".$registration_manage."',".
"log_read='".$log_read."',".
"log_download='".$log_download."',".
"core_config='".$core_config."',".
"access_control='".$access_control."',".
"safy_config='".$safy_config."',".
"system_account='".$system_account."' WHERE USER_ID='".$user_last_id."'";
$arr[]=$data2;
$arr[]=$sql;
$arr[]=mysql_query($sql);
//输出用户列表

$arr=array();
$arr['id']='1';
$arr['name']='DEVISER组态工作栈管理系统';
$arr['children']=array();
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
$sql="SELECT * FROM login_user";
$check_query = mysql_query($sql);
$i=0;
while($result=mysql_fetch_array($check_query))
{
	$children['id']="$i";
	$children['name']=$result['USER_NAME'];
	$children['user_id']=$result['USER_ID'];
	array_push($arr['children'],$children);
	$i++;	
}

echo json_encode($arr);
mysql_close($con);


?>
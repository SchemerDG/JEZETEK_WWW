<?php
header("Content-type: text/html; charset=utf-8");
$userid = $_POST['userid'];  
$targgget_id = $_POST['targgget_id'];  
$limit_name=$_POST['limit_name']; 
$checked=$_POST['checked']; 
$arr=array();
$con = mysql_connect("localhost","root","localhost");
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
switch($limit_name)
{
	case '管理报表':
		
		break;
	case '阅读报表':
		
		break;
	case '下载转发':
		
		break;
	case '工程管理':
		
		break;
	case '工程设计':
		
		break;
	case '工程审批':
		
		break;
	case '工程配置':
		
		break;
	case '用户查阅':
		
		break;
	case '设备信息':
		
		break;
	case '日志查阅':
		
		break;
	default:;
}
echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常



?>
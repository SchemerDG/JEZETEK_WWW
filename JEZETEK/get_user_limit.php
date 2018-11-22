<?php
header("Content-type: text/html; charset=utf-8");
$data=$_POST['userid'];  
if($data=='')
{
	echo '';
}
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
$arr=array();
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
$sql="SELECT * FROM user_limit where user_id='".$data."'";
$check_query = mysql_query($sql);
if($result=mysql_fetch_array($check_query))
{
	{
	$arr[0]['name']='系统登陆';
	$arr[0]['id']=1;
	
	$arr[0]['children'][0]['canClick']=false;
	if($result['login_allow']==1){
	$arr[0]['children'][0]['checked']=true;}
	else{
	$arr[0]['children'][0]['checked']=false;}
	$arr[0]['children'][0]['cid']=1001;
	$arr[0]['children'][0]['haveRange']=false;
	$arr[0]['children'][0]['isRange']=true;
	$arr[0]['children'][0]['name']='允许登陆';
	
	
	$arr[0]['children'][1]['canClick']=false;
	if($result['telnet_login_allow_limit']==1){
	$arr[0]['children'][1]['checked']=true;}
	else{
	$arr[0]['children'][1]['checked']=false;}
	$arr[0]['children'][1]['cid']=1002;
	$arr[0]['children'][1]['haveLimit']=true;
	$arr[0]['children'][1]['haveRange']=false;
	$arr[0]['children'][1]['isRange']=false;
	$arr[0]['children'][1]['name']='远程登陆';
	
	$arr[0]['children'][2]['canClick']=false;
	if($result['telnet_login_allow_unlimit']==1){
	$arr[0]['children'][2]['checked']=true;}
	else{
	$arr[0]['children'][2]['checked']=false;}
	$arr[0]['children'][2]['cid']=1003;
	$arr[0]['children'][2]['haveLimit']=true;
	$arr[0]['children'][2]['haveRange']=false;
	$arr[0]['children'][2]['isRange']=true;
	$arr[0]['children'][2]['name']='远程登陆 ';
	
	$arr[0]['children'][3]['canClick']=false;
	if($result['ip_bind']==1){
	$arr[0]['children'][3]['checked']=true;}
	else{
	$arr[0]['children'][3]['checked']=false;}
	$arr[0]['children'][3]['cid']=1004;
	$arr[0]['children'][3]['name']='IP绑定';
	if($result['ip_bind_data']==''){
	$arr[0]['children'][3]['text']=' ';}
	else{
	$arr[0]['children'][3]['text']=$result['ip_bind_data'];}	

	
	$arr[0]['children'][4]['canClick']=false;
	if($result['phone_mac_bind']==1){
	$arr[0]['children'][4]['checked']=true;}
	else{
	$arr[0]['children'][4]['checked']=false;}
	$arr[0]['children'][4]['cid']=1005;
	$arr[0]['children'][4]['name']='手机绑定';
	if($result['phone_mac_bind_data']==''){
		$arr[0]['children'][4]['text']=' ';}
	else{
		$arr[0]['children'][4]['text']=$result['phone_mac_bind_data'];}		

	
	$arr[0]['children'][5]['canClick']=false;
	if($result['phone_mac_bind']==1){
	$arr[0]['children'][5]['checked']=true;}
	else{
	$arr[0]['children'][5]['checked']=false;}
	$arr[0]['children'][5]['cid']=1006;
	$arr[0]['children'][5]['name']='PC绑定';
	if($result['pc_mac_bind_data']==''){
		$arr[0]['children'][5]['text']=' ';}
	else{
		$arr[0]['children'][5]['text']=$result['pc_mac_bind_data'];}
	
	if($arr[0]['children'][0]['checked']==true&&
	$arr[0]['children'][1]['checked']==true&&
	$arr[0]['children'][2]['checked']==true&&
	$arr[0]['children'][3]['checked']==true&&
	$arr[0]['children'][4]['checked']==true&&
	$arr[0]['children'][5]['checked']==true){
	$arr[0]['checked']=true;}
	else{
	$arr[0]['checked']=false;}
	}
	{
		$arr[1]['name']='通知提醒';
		$arr[1]['id']=2;
		
		$arr[1]['children'][0]['canClick']=false;
		if($result['Announcement_manage']==1){
		$arr[1]['children'][0]['checked']=true;}
		else{
		$arr[1]['children'][0]['checked']=false;}
		$arr[1]['children'][0]['cid']=1101;
		$arr[1]['children'][0]['haveLimit']=false;
		$arr[1]['children'][0]['haveRange']=false;
		$arr[1]['children'][0]['isRange']=true;
		$arr[1]['children'][0]['name']='管理公告';
		
		
		$arr[1]['children'][1]['canClick']=false;
		if($result['anouncement_send']==1){
		$arr[1]['children'][1]['checked']=true;}
		else{
		$arr[1]['children'][1]['checked']=false;}
		$arr[1]['children'][1]['cid']=1102;
		$arr[1]['children'][1]['haveLimit']=false;
		$arr[1]['children'][1]['haveRange']=false;
		$arr[1]['children'][1]['isRange']=true;
		$arr[1]['children'][1]['name']='发布公告';
		
		$arr[1]['children'][2]['canClick']=false;
		if($result['anouncement_read']==1){
		$arr[1]['children'][2]['checked']=true;}
		else{
		$arr[1]['children'][2]['checked']=false;}
		$arr[1]['children'][2]['cid']=1103;
		$arr[1]['children'][2]['haveLimit']=false;
		$arr[1]['children'][2]['haveRange']=false;
		$arr[1]['children'][2]['isRange']=true;
		$arr[1]['children'][2]['name']='阅读公告';
		
		$arr[1]['children'][3]['canClick']=false;
		if($result['notice_send']==1){
		$arr[1]['children'][3]['checked']=true;}
		else{
		$arr[1]['children'][3]['checked']=false;}
		$arr[1]['children'][3]['cid']=1104;
		$arr[1]['children'][3]['haveLimit']=false;
		$arr[1]['children'][3]['haveRange']=false;
		$arr[1]['children'][3]['isRange']=true;
		$arr[1]['children'][3]['name']='发出通知';
		
		if($arr[1]['children'][0]['checked']==true&&
		$arr[1]['children'][1]['checked']==true&&
		$arr[1]['children'][2]['checked']==true&&
		$arr[1]['children'][3]['checked']==true){
		$arr[1]['checked']=true;}
		else{
		$arr[1]['checked']=false;}
	}
	{
		$arr[2]['name']='报表统计';
		$arr[2]['id']=3;
		
		$arr[2]['children'][0]['canClick']=true;
		if($result['report_manage']==1){
		$arr[2]['children'][0]['checked']=true;}
		else{
		$arr[2]['children'][0]['checked']=false;}
		$arr[2]['children'][0]['cid']=1201;
		$arr[2]['children'][0]['haveLimit']=false;
		$arr[2]['children'][0]['haveRange']=true;
		$arr[2]['children'][0]['isRange']=true;
		$arr[2]['children'][0]['name']='管理报表';
		
		
		$arr[2]['children'][1]['canClick']=false;
		if($result['report_input']==1){
		$arr[2]['children'][1]['checked']=true;}
		else{
		$arr[2]['children'][1]['checked']=false;}
		$arr[2]['children'][1]['cid']=1202;
		$arr[2]['children'][1]['haveLimit']=false;
		$arr[2]['children'][1]['haveRange']=false;
		$arr[2]['children'][1]['isRange']=true;
		$arr[2]['children'][1]['name']='报表录入';
		
		$arr[2]['children'][2]['canClick']=true;
		if($result['report_read']==1){
		$arr[2]['children'][2]['checked']=true;}
		else{
		$arr[2]['children'][2]['checked']=false;}
		$arr[2]['children'][2]['cid']=1203;
		$arr[2]['children'][2]['haveLimit']=false;
		$arr[2]['children'][2]['haveRange']=true;
		$arr[2]['children'][2]['isRange']=true;
		$arr[2]['children'][2]['name']='阅读报表';
		
		$arr[2]['children'][3]['canClick']=true;
		if($result['report_download']==1){
		$arr[2]['children'][3]['checked']=true;}
		else{
		$arr[2]['children'][3]['checked']=false;}
		$arr[2]['children'][3]['cid']=1204;
		$arr[2]['children'][3]['haveLimit']=false;
		$arr[2]['children'][3]['haveRange']=true;
		$arr[2]['children'][3]['isRange']=true;
		$arr[2]['children'][3]['name']='下载转发';
		
		if($arr[2]['children'][0]['checked']==true&&
		$arr[2]['children'][1]['checked']==true&&
		$arr[2]['children'][2]['checked']==true&&
		$arr[2]['children'][3]['checked']==true){
		$arr[2]['checked']=true;}
		else{
		$arr[2]['checked']=false;}
	}
	{
		$arr[3]['name']='工程设置';
		$arr[3]['id']=4;
		
		$arr[3]['children'][0]['canClick']=true;
		if($result['engineering_manage']==1){
		$arr[3]['children'][0]['checked']=true;}
		else{
		$arr[3]['children'][0]['checked']=false;}
		$arr[3]['children'][0]['cid']=1301;
		$arr[3]['children'][0]['haveLimit']=false;
		$arr[3]['children'][0]['haveRange']=true;
		$arr[3]['children'][0]['isRange']=true;
		$arr[3]['children'][0]['name']='工程管理';
		
		
		$arr[3]['children'][1]['canClick']=false;
		if($result['classification_settings']==1){
		$arr[3]['children'][1]['checked']=true;}
		else{
		$arr[3]['children'][1]['checked']=false;}
		$arr[3]['children'][1]['cid']=1302;
		$arr[3]['children'][1]['haveLimit']=false;
		$arr[3]['children'][1]['haveRange']=false;
		$arr[3]['children'][1]['isRange']=true;
		$arr[3]['children'][1]['name']='分类设置';
		
		$arr[3]['children'][2]['canClick']=true;
		if($result['engineering_design']==1){
		$arr[3]['children'][2]['checked']=true;}
		else{
		$arr[3]['children'][2]['checked']=false;}
		$arr[3]['children'][2]['cid']=1303;
		$arr[3]['children'][2]['haveLimit']=false;
		$arr[3]['children'][2]['haveRange']=true;
		$arr[3]['children'][2]['isRange']=true;
		$arr[3]['children'][2]['name']='工程设计';
		
		$arr[3]['children'][3]['canClick']=true;
		if($result['engineering_approval']==1){
		$arr[3]['children'][3]['checked']=true;}
		else{
		$arr[3]['children'][3]['checked']=false;}
		$arr[3]['children'][3]['cid']=1304;
		$arr[3]['children'][3]['haveLimit']=false;
		$arr[3]['children'][3]['haveRange']=true;
		$arr[3]['children'][3]['isRange']=true;
		$arr[3]['children'][3]['name']='工程审批';
		
		$arr[3]['children'][4]['canClick']=true;
		if($result['engineering_execute']==1){
		$arr[3]['children'][4]['checked']=true;}
		else{
		$arr[3]['children'][4]['checked']=false;}
		$arr[3]['children'][4]['cid']=1305;
		$arr[3]['children'][4]['haveLimit']=false;
		$arr[3]['children'][4]['haveRange']=true;
		$arr[3]['children'][4]['isRange']=true;
		$arr[3]['children'][4]['name']='工程配置';
		
		if($arr[3]['children'][0]['checked']==true&&
		$arr[3]['children'][1]['checked']==true&&
		$arr[3]['children'][2]['checked']==true&&
		$arr[3]['children'][3]['checked']==true&&
		$arr[3]['children'][4]['checked']==true){
		$arr[3]['checked']=true;}
		else{
		$arr[3]['checked']=false;}
	}
	{
		$arr[4]['name']='用户管理';
		$arr[4]['id']=5;
		
		$arr[4]['children'][0]['canClick']=true;
		if($result['user_read']==1){
		$arr[4]['children'][0]['checked']=true;}
		else{
		$arr[4]['children'][0]['checked']=false;}
		$arr[4]['children'][0]['cid']=1401;
		$arr[4]['children'][0]['haveLimit']=false;
		$arr[4]['children'][0]['haveRange']=true;
		$arr[4]['children'][0]['isRange']=true;
		$arr[4]['children'][0]['name']='用户查阅';
		
		
		$arr[4]['children'][1]['canClick']=false;
		if($result['user_manage']==1){
		$arr[4]['children'][1]['checked']=true;}
		else{
		$arr[4]['children'][1]['checked']=false;}
		$arr[4]['children'][1]['cid']=1302;
		$arr[4]['children'][1]['haveLimit']=false;
		$arr[4]['children'][1]['haveRange']=false;
		$arr[4]['children'][1]['isRange']=true;
		$arr[4]['children'][1]['name']='用户管理';
		
		
		if($arr[4]['children'][0]['checked']==true&&
		$arr[4]['children'][1]['checked']==true){
		$arr[4]['checked']=true;}
		else{
		$arr[4]['checked']=false;}
	}
	{	
		$arr[5]['name']='监控管理';
		$arr[5]['id']=6;
		
		$arr[5]['children'][0]['canClick']=false;
		if($result['device_monitoring']==1){
		$arr[5]['children'][0]['checked']=true;}
		else{
		$arr[5]['children'][0]['checked']=false;}
		$arr[5]['children'][0]['cid']=1501;
		$arr[5]['children'][0]['haveLimit']=false;
		$arr[5]['children'][0]['haveRange']=false;
		$arr[5]['children'][0]['isRange']=true;
		$arr[5]['children'][0]['name']='设备监控';
		
		
		$arr[5]['children'][1]['canClick']=false;
		if($result['status_monitoring']==1){
		$arr[5]['children'][1]['checked']=true;}
		else{
		$arr[5]['children'][1]['checked']=false;}
		$arr[5]['children'][1]['cid']=1502;
		$arr[5]['children'][1]['haveLimit']=false;
		$arr[5]['children'][1]['haveRange']=false;
		$arr[5]['children'][1]['isRange']=true;
		$arr[5]['children'][1]['name']='状态监控';
		
		$arr[5]['children'][2]['canClick']=false;
		if($result['person_monitoring']==1){
		$arr[5]['children'][2]['checked']=true;}
		else{
		$arr[5]['children'][2]['checked']=false;}
		$arr[5]['children'][2]['cid']=1502;
		$arr[5]['children'][2]['haveLimit']=false;
		$arr[5]['children'][2]['haveRange']=false;
		$arr[5]['children'][2]['isRange']=true;
		$arr[5]['children'][2]['name']='人员监控';
		
		
		if($arr[5]['children'][0]['checked']==true&&
		$arr[5]['children'][1]['checked']==true&&
		$arr[5]['children'][2]['checked']==true){
		$arr[5]['checked']=true;}
		else{
		$arr[5]['checked']=false;}
	}
	{	
		$arr[6]['name']='系统架构';
		$arr[6]['id']=7;
		
		$arr[6]['children'][0]['canClick']=true;
		if($result['device_information']==1){
		$arr[6]['children'][0]['checked']=true;}
		else{
		$arr[6]['children'][0]['checked']=false;}
		$arr[6]['children'][0]['cid']=1601;
		$arr[6]['children'][0]['haveLimit']=false;
		$arr[6]['children'][0]['haveRange']=true;
		$arr[6]['children'][0]['isRange']=true;
		$arr[6]['children'][0]['name']='设备信息';

		$arr[6]['children'][1]['canClick']=false;
		if($result['registration_manage']==1){
		$arr[6]['children'][1]['checked']=true;}
		else{
		$arr[6]['children'][1]['checked']=false;}
		$arr[6]['children'][1]['cid']=1602;
		$arr[6]['children'][1]['haveLimit']=false;
		$arr[6]['children'][1]['haveRange']=false;
		$arr[6]['children'][1]['isRange']=true;
		$arr[6]['children'][1]['name']='注册管理';
			
		if($arr[6]['children'][0]['checked']==true&&
		$arr[6]['children'][1]['checked']==true){
		$arr[6]['checked']=true;}
		else{
		$arr[6]['checked']=false;}
	}
	{	
		$arr[7]['name']='系统日志';
		$arr[7]['id']=8;
		
		$arr[7]['children'][0]['canClick']=true;
		if($result['log_read']==1){
		$arr[7]['children'][0]['checked']=true;}
		else{
		$arr[7]['children'][0]['checked']=false;}
		$arr[7]['children'][0]['cid']=1701;
		$arr[7]['children'][0]['haveLimit']=false;
		$arr[7]['children'][0]['haveRange']=true;
		$arr[7]['children'][0]['isRange']=true;
		$arr[7]['children'][0]['name']='日志查阅';

		$arr[7]['children'][1]['canClick']=false;
		if($result['log_download']==1){
		$arr[7]['children'][1]['checked']=true;}
		else{
		$arr[7]['children'][1]['checked']=false;}
		$arr[7]['children'][1]['cid']=1702;
		$arr[7]['children'][1]['haveLimit']=false;
		$arr[7]['children'][1]['haveRange']=false;
		$arr[7]['children'][1]['isRange']=true;
		$arr[7]['children'][1]['name']='日志导出';
			
		if($arr[7]['children'][0]['checked']==true&&
		$arr[7]['children'][1]['checked']==true){
		$arr[7]['checked']=true;}
		else{
		$arr[7]['checked']=false;}
	}
	{	
		$arr[8]['name']='系统设置';
		$arr[8]['id']=9;
		
		$arr[8]['children'][0]['canClick']=false;
		if($result['core_config']==1){
		$arr[8]['children'][0]['checked']=true;}
		else{
		$arr[8]['children'][0]['checked']=false;}
		$arr[8]['children'][0]['cid']=1801;
		$arr[8]['children'][0]['haveLimit']=false;
		$arr[8]['children'][0]['haveRange']=false;
		$arr[8]['children'][0]['isRange']=true;
		$arr[8]['children'][0]['name']='核心设置';

		$arr[8]['children'][1]['canClick']=false;
		if($result['access_control']==1){
		$arr[8]['children'][1]['checked']=true;}
		else{
		$arr[8]['children'][1]['checked']=false;}
		$arr[8]['children'][1]['cid']=1802;
		$arr[8]['children'][1]['haveLimit']=false;
		$arr[8]['children'][1]['haveRange']=false;
		$arr[8]['children'][1]['isRange']=true;
		$arr[8]['children'][1]['name']='访问控制';
		
		$arr[8]['children'][2]['canClick']=false;
		if($result['safy_config']==1){
		$arr[8]['children'][2]['checked']=true;}
		else{
		$arr[8]['children'][2]['checked']=false;}
		$arr[8]['children'][2]['cid']=1803;
		$arr[8]['children'][2]['haveLimit']=false;
		$arr[8]['children'][2]['haveRange']=false;
		$arr[8]['children'][2]['isRange']=true;
		$arr[8]['children'][2]['name']='安全设置';
		
		$arr[8]['children'][3]['canClick']=false;
		if($result['system_account']==1){
		$arr[8]['children'][3]['checked']=true;}
		else{
		$arr[8]['children'][3]['checked']=false;}
		$arr[8]['children'][3]['cid']=1804;
		$arr[8]['children'][3]['haveLimit']=false;
		$arr[8]['children'][3]['haveRange']=false;
		$arr[8]['children'][3]['isRange']=true;
		$arr[8]['children'][3]['name']='系统账套';
		
		
			
		if($arr[8]['children'][0]['checked']==true&&
		$arr[8]['children'][1]['checked']==true){
		$arr[8]['checked']=true;}
		else{
		$arr[8]['checked']=false;}
	}
}
echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常
mysql_close($con);
?>
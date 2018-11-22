<?php
function get_virtual_subsystem_function($eng_id){
	$con = mysql_connect("localhost","root","localhost");
	if (!$con)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("JEZETEK", $con);
	mysql_query("set names utf8");
	$arr=array();
	$arr['name']='DEVISER组态工作栈管理系统';
	$arr['type']='sys';
	$arr['open']=true;
	$arr['nocheck']=true;
	$arr['isParent']=true;
	$arr['children']=array();
	$sql="SELECT * FROM virtual_subsystems where engineering_id='".$eng_id."'";
	$check_query = mysql_query($sql);
	while($result=mysql_fetch_array($check_query))
	{
		$children['name']=$result['subsystems_name'];
		$children['id']=$result['subsystems_id'];
		$children['children']=array();
		$children['nocheck']=true;
		$children['isParent']=true;
		$children['type']='subsystem';
		$sql1="SELECT * FROM virtual_units where subsystems_id='".$result['subsystems_id']."'";
		$check_query1 = mysql_query($sql1);
		while($result1=mysql_fetch_array($check_query1))
		{
			$chidren_1['id']=$result1['unit_id'];
			$chidren_1['name']=$result1['unit_name'];
			$chidren_1['type']='unit';
			$chidren_1['drag']=true;
			$chidren_1['isParent']=true;
			$chidren_1['children']=array();
			$sql2="SELECT * FROM virtual_devices where unit_id='".$result1['unit_id']."'";
			$check_query2 = mysql_query($sql2);
			$flag=false;
			while($result2=mysql_fetch_array($check_query2))
			{
				$flag=true;
				$chidren_2['id']=$result2['device_id'];
				$chidren_2['name']=$result2['device_name'];
				$chidren_2['drag']=false;
				$chidren_2['type']='device';
				$chidren_2['support_num']=$result2['support_num'];
				$chidren_2['chno']=$result2['chno'];
				$chidren_2['real_device_id']=$result2['real_device_id'];
				if($result2['chno']=='F')
				{
					$chidren_1['children'][0]=$chidren_2;
				}
			}
			if($flag==true)
			{
				$children_num=count($chidren_1['children']);
				for($i=0;$i<($chidren_1['children'][0]['support_num']);$i++)
				{
					$chidren_2['id']='blank';
					$chidren_2['name']='[           ]';
					$chidren_2['type']='device';
					$chidren_2['drag']=false;
					$chidren_2['chno']='';
					$chidren_2['support_num']='';
					$chidren_2['real_device_id']='';
					array_push($chidren_1['children'],$chidren_2);
				}
			}
			$sql2="SELECT * FROM virtual_devices where unit_id='".$result1['unit_id']."'";
			$check_query2 = mysql_query($sql2);
			$flag=false;
			while($result2=mysql_fetch_array($check_query2))
			{
				$flag=true;
				$chidren_2['id']=$result2['device_id'];
				$chidren_2['name']=$result2['device_name'];
				$chidren_2['type']='device';
				$chidren_2['drag']=true;
				$chidren_2['chno']=$result2['chno'];
				$chidren_2['real_device_id']=$result2['real_device_id'];
				$chidren_2['support_num']=$result2['support_num'];
				if($result2['chno']!='F')
				{
					$chidren_1['children'][intval($result2['chno'])+1]=$chidren_2;
				}
			}
			array_push($children['children'],$chidren_1);
		}
		array_push($arr['children'],$children);
	}

	$sql1="SELECT * FROM virtual_units";
	$check_query1 = mysql_query($sql1);
	while($result1=mysql_fetch_array($check_query1))
	{
		if($result1['subsystems_id']==''&&$result1['engineering_id']==$eng_id)
		{
			$chidren_1['id']=$result1['unit_id'];
			$chidren_1['name']=$result1['unit_name'];
			$chidren_1['type']='unit';
			$chidren_1['isParent']=true;
			$chidren_1['children']=array();
			$sql2="SELECT * FROM virtual_devices where unit_id='".$result1['unit_id']."'";
			$check_query2 = mysql_query($sql2);
			$flag=false;
			while($result2=mysql_fetch_array($check_query2))
			{
				$flag=true;
				$chidren_2['id']=$result2['device_id'];
				$chidren_2['name']=$result2['device_name'];
				$chidren_2['type']='device';
				$chidren_2['drag']=false;
				$chidren_2['support_num']=$result2['support_num'];
				$chidren_2['chno']=$result2['chno'];
				$chidren_2['real_device_id']=$result2['real_device_id'];
				if($result2['chno']=='F')
				{
					$chidren_1['children'][0]=$chidren_2;
				}
			}
			if($flag==true)
			{
				$children_num=count($chidren_1['children']);
				for($i=0;$i<($chidren_1['children'][0]['support_num']);$i++)
				{
					$chidren_2['id']='blank';
					$chidren_2['name']='[           ]';
					$chidren_2['type']='device';
					$chidren_2['drag']=false;
					$chidren_2['support_num']='';
					$chidren_2['chno']='';
					$chidren_2['real_device_id']='';
					array_push($chidren_1['children'],$chidren_2);
				}
			}
			$sql2="SELECT * FROM virtual_devices where unit_id='".$result1['unit_id']."'";
			$check_query2 = mysql_query($sql2);
			$flag=false;
			while($result2=mysql_fetch_array($check_query2))
			{
				$flag=true;
				$chidren_2['id']=$result2['device_id'];
				$chidren_2['name']=$result2['device_name'];
				$chidren_2['type']='device';
				$chidren_2['drag']=true;
				$chidren_2['support_num']=$result2['support_num'];
				$chidren_2['real_device_id']=$result2['real_device_id'];
				$chidren_2['chno']=$result2['chno'];
				if($result2['chno']!='F')
				{
					$chidren_1['children'][intval($result2['chno'])+1]=$chidren_2;
				}
			}
			array_push($arr['children'],$chidren_1);
		}
	}
	echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常
	mysql_close($con);
}

?>

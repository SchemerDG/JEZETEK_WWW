<?php
header("Content-type: text/html; charset=utf-8");

$real_device_id=$_POST['real_device_id'];  
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$arr=array();
$children=array();
$sql="SELECT * FROM instrsets where real_device_id='".$real_device_id."'";
$check_query = mysql_query($sql);
$flag=false;
while($result=mysql_fetch_array($check_query))
{
	$flag=true;
	$children['name']=$result['Instr_Name'];
	$children['I_Note']=$result['I_Note'];
	if($result['Param']!='')
	{
		$instr_str=$result['Param'];
		$instrs=explode(")",$instr_str);
		for($i=0;$i<count($instrs);$i++)
		{
			$instrs[$i]=str_replace('(','',$instrs[$i]);
		}
		for($i=0;$i<count($instrs)-1;$i++)
		{
			$instrsx='';
			$instrsx=explode(",",$instrs[$i]);
			$children['Param'][$i]=$instrsx;
			//$children['Param'][$i]['type']=$instrsx[1];
			/*unset($instrsx[$i][0]);
			unset($instrsx[$i][1]);
			$children['Param'][$i]['paras']=$instrsx[$i];*/
		}
	}
	else
	{
		$children['Param']='';
	}
	
	$arr[]=$children;
}
if($flag==false)
{
	echo json_encode('');
}
else
{
	echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常
}

mysql_close($con);
?>
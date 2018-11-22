<?php
header("Content-type: text/html; charset=utf-8");

$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$arr=array();
$children=array();
$sql="SELECT * FROM logic_instr";
$check_query = mysql_query($sql);
while($result=mysql_fetch_array($check_query))
{
	$children['id']=$result['id'];
	$children['name']=$result['instr_name'];
	$children['I_Note']=$result['i_note'];
	if($result['param']!='')
	{
		$instr_str=$result['param'];
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
		}
	}
	else
	{
		$children['Param']='';
	}
	
	$arr[]=$children;
}

echo json_encode($arr);//要增加中括号，否则数据格式前端解析不正常
mysql_close($con);
?>
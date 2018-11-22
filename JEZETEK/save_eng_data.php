<?php
header("Content-type: text/html; charset=utf-8");

$eng_id=$_POST['eng_id']; 
$data= $_POST['data']; 
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$sql="UPDATE engineering_data set data='".$data."' where engineering_id='".$eng_id."'";
$check_query = mysql_query($sql);

$arr=array();
$sql="SELECT * FROM engineering_data where engineering_id='".$eng_id."'";
$check_query = mysql_query($sql);
if($result=mysql_fetch_array($check_query))
{
	$arr['id']=$result['engineering_id'];
	$arr['data']=explode("\r\n",$result['data']);
}

echo json_encode($arr);
mysql_close($con);
?>
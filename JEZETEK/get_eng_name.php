<?php
header("Content-type: text/html; charset=utf-8");

$eng_id=$_POST['eng_id'];  
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$arr=array();
$sql="SELECT * FROM engineerings where engineering_id='".$eng_id."'";
$check_query = mysql_query($sql);
while($result=mysql_fetch_array($check_query))
{
	$arr['name']=$result['engineering_name'];
	$arr['version']=$result['version'];
}
echo json_encode($arr);
mysql_close($con);
?>
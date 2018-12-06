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
$sql="SELECT * FROM engineering_log where engineering_id='".$eng_id."'";
$check_query = mysql_query($sql);
$i=0;
$arr['id']=$eng_id;
while($result=mysql_fetch_array($check_query))
{
	$arr['data'][$i]['time']=$result['time'];
	$arr['data'][$i]['motion']=$result['motion'];
	$arr['data'][$i]['information']=$result['information'];
	$i++;
}
echo json_encode($arr);
mysql_close($con);
?>
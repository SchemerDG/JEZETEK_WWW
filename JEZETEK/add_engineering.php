<?php
header("Content-type: text/html; charset=utf-8");
$data = $_POST['data']; 
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
$sql="INSERT INTO engineerings(engineering_name, classification_id, version, build_time,change_time,main_designer_id,status_id,description,version_description) VALUES ('"
.$data['proname']."','"
.$data['classification_id']."','"
.$data['version']."','"
.$data['statime']."','"
.$data['alttime']."','"
.$data['designer']."','"
.$data['status_id']."','"
.$data['description']."','"
.$data['version_description']."')";
mysql_query($sql);
$sql="Select * from engineerings where engineering_name='".$data['proname']."' and version='".$data['version']."'";
$check_query=mysql_query($sql);
if($result=mysql_fetch_array($check_query))
{
	$sql="INSERT INTO engineering_data(engineering_id, data,data_x) VALUES ('".$result['engineering_id']."','".$data['eng_data']."','')";
	$arr[]=mysql_query($sql);
	$arr['eng_id']=$result['engineering_id'];
}
echo json_encode($arr);
mysql_close($con);
?>
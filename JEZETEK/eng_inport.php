<?php
header("Content-type: text/html; charset=utf-8");
$eng = $_POST['eng']; 
$classification_id= $_POST['classification_id']; 
//插入用户登录信息
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");

$sql="SELECT * From engneerings where engineering_name = ".$eng['name']." and version = ".$eng['version']."";
$check_query =mysql_query($sql);
if(!$result=mysql_fetch_array($check_query))
{
	$sql="INSERT INTO engineerings(engineering_name, classification_id, version, build_time,change_time,main_designer_id,status_id,description,version_description) VALUES ('".$eng['name']."','".$classification_id."','".$eng['version']."','".$data['statime']."','".$data['alttime']."','".$data['designer']."','".$data['status_id']."','".$data['description']."','".$data['version_description']."')";
}
else{
	$arr[]=''
}
echo json_encode($arr);
mysql_close($con);

?>
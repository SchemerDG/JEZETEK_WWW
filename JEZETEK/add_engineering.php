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
$sql="INSERT INTO engineerings(engineering_name, classification_id, version, build_time,change_time,main_designer_id,status_id,description,version_description) VALUES ('".$data['proname']."','".$data['classification_id']."','".$data['version']."','".$data['statime']."','".$data['alttime']."','".$data['designer']."','".$data['status_id']."','".$data['description']."','".$data['version_description']."')";
$arr[]=mysql_query($sql);

echo json_encode($arr);
mysql_close($con);


?>
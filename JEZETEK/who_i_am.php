<?php
header("Content-type: text/html; charset=utf-8");
$data = $_POST['state'];  
if($data=="who_i_am")
{
	@session_start();
	$arr['user_name']=$_SESSION['username'];
	$arr['user_id']=$_SESSION['userid'];
	session_write_close();
	echo json_encode($arr);
}
?>
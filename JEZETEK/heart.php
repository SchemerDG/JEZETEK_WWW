<?php
header("Content-type: text/html; charset=utf-8");
$data = $_POST['state'];  
if($data=="i'm alive")
{
	$arr[]="我知道你还活着";
	@session_start();
	$_SESSION['heart_time']=date('y-m-d H:i:s',time());
	
	echo json_encode($arr);
}
?>
<?php
header("Content-type: text/html; charset=utf-8");
include('get_virtual_subsystems_function.php');
$eng_id=$_POST['eng_id'];  

get_virtual_subsystem_function($eng_id);


?>
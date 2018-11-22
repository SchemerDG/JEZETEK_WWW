<?php
header("Content-type: text/html; charset=utf-8");
$con = mysql_connect("localhost","root","localhost");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
$arr1=array();
$temp=array();
mysql_select_db("JEZETEK", $con);
mysql_query("set names utf8");
$sql="SELECT * FROM engineerings where 1";
$arr_id=array();
$check_query = mysql_query($sql);
while($result=mysql_fetch_array($check_query))
{
	$temp['id']=$result['classification_id'];
	if(!in_array($result['classification_id'],$arr_id))
	{
		$arr_id[]=$result['classification_id'];
		$sql="SELECT * FROM classification_settings where classification_id='".$result['classification_id']."'";
		$check_query2 = mysql_query($sql);
		if($result2=mysql_fetch_array($check_query2))
		{
			$temp['name']=$result2['classification_name'];
			$result2=array();
		}
		array_push($arr1,$temp);
	}
	
}

echo json_encode($arr1);
mysql_close($con);


?>
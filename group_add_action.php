<?php
include("connect.php");
$data=array($_POST['venue'], $_POST['time'], $_POST['tutor'], $_POST['capacity'], $_POST['centre']);


$sql="INSERT INTO group_list (venue, time, tid, capacity, cid) VALUES('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]');";
/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
if (mysqli_query($conn, $sql)){
	$data = array('success'=>'1 row affected');
}else{
	$data = array('error'=>$sql);
}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
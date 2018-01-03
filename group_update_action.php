<?php
include("connect.php");
$data=array($_POST['gid'], $_POST['venue'], $_POST['time'], $_POST['tutor'], $_POST['capacity'], $_POST['centre']);

//not finish
$sql="UPDATE group_list SET `venue`='$data[1]', `time`='$data[2]', `tid`='$data[3]', `capacity`='$data[4]', `cid`='$data[5]' WHERE `gid`='$data[0]';";
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
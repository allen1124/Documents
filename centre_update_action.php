<?php
include("connect.php");
$data=array($_POST['cid'], $_POST['cname'], $_POST['ename'], $_POST['district'], $_POST['noOfClass'], $_POST['noOfGroup']);


$sql="UPDATE centre_list SET `cname`='$data[1]', `ename`='$data[2]', `district`='$data[3]', `class`='$data[4]', `group`='$data[5]' WHERE `cid`='$data[0]';";
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
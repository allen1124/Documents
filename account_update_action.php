<?php
include("connect.php");
$data=array($_POST['id'], $_POST['cname'], $_POST['ename'], $_POST['gender'], $_POST['username'], md5($_POST['pwd']));


$sql="UPDATE account SET `cname`='$data[1]', `ename`='$data[2]', `gender`='$data[3]', `username`='$data[4]', `password`='$data[5]' WHERE `id`='$data[0]';";
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
<?php
include("connect.php");
$data=array($_POST['cid'], $_POST['cname'], $_POST['ename'], $_POST['district'], $_POST['noOfClass'], $_POST['noOfGroup']);


$sql="INSERT INTO centre_list (`cid`, `cname`, `ename`, `district`, `class`, `group`) VALUES('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]');";
/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
$check = "SELECT * FROM centre_list WHERE `cid` = '$data[0]';";
if (mysqli_num_rows(mysqli_query($conn, $check))>0){
	$data = array('error'=>'centre id used');
}else{
	if (mysqli_query($conn, $sql)){
		$data = array('success'=>'1 row affected');
	}else{
		$data = array('error'=>$sql);
	}
}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
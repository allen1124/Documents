<?php
include("connect.php");
$data=array($_POST['cname'], $_POST['ename'], $_POST['gender'], $_POST['class'], $_POST['classNo'], $_POST['school'], $_POST['group']);

$gid = $data[6];
$sql="INSERT INTO student_list (cname, ename, gender, class, class_num, school, gid) VALUES('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]');";
/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
if (mysqli_query($conn, $sql)){
	$sid = mysqli_insert_id($conn);
	$sql2 = "SELECT * FROM lesson_list WHERE `gid` = $gid";
	$lesson = mysqli_query($conn, $sql2);
	while ($lessArr = mysqli_fetch_assoc($lesson)){
		$lid = $lessArr['lid'];	
		$sql3 = "INSERT INTO att_list (sid, lid) VALUES($sid, $lid);";
		if (mysqli_query($conn, $sql3)){
			$data = array('message'=>'success');
		}
		
	}
}else{
	$data = array('error'=>$sql);
}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
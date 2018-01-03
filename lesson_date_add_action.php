<?php
include("connect.php");
$dates=$_POST['dates'];
$gid=$_POST['gid'];
//$count = count($data);


foreach ($dates as $date)
{
	$sql="INSERT INTO lesson_list (gid, ldate) VALUES('$gid', '$date')";

	if (mysqli_query($conn, $sql)){
		$currId = mysqli_insert_id($conn);
		$data[] = array('success'=>'lesson date(s) added.');
		$gsql = mysqli_query($conn, "SELECT sid FROM cllsc.student_list WHERE gid = $gid;");
		while ($gArr = mysqli_fetch_assoc($gsql)){
		$asql = 'INSERT INTO att_list (`sid`, `lid`) VALUES('.$gArr['sid'].', '.$currId.');';
		if (mysqli_query($conn, $asql)){
				//$currId = mysqli_insert_id($conn);
				$data[] = array('success'=>'att list updated.');
		}else{
				$data[] = array('error'=>$asql);
		}
		}
	}else{
		$data[] = array('error'=>$sql);
	}
	$data[] = array('success'=>'att list updated.');
}
//$lsql = mysqli_query($conn, "SELECT `lid` FROM lesson_list WHERE gid = $gid;");



/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
//$check = "SELECT * FROM account WHERE username = '$data[3]';";
//if (mysqli_num_rows(mysqli_query($conn, $check))>0){
//	$data = array('error'=>'username used');
//}else{

//}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>

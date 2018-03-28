<?php
include("connect.php");
//echo $_POST["gid"];
$gid = $_POST["gid"];
$sql="SELECT * FROM group_list where`gid` = $gid ;";
/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query)>0){
	$Arr=mysqli_fetch_assoc($query);
	$data = array('centre'=>$Arr['cid'], 'venue'=>$Arr['venue'], 'time'=>$Arr['time'], 'tutor'=>$Arr['tid'], 'enroll'=>$Arr['enroll']);
}else{
	$data = array('error'=>$sql);
}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
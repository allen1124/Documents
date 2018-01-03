<?php
include("connect.php");
$data=array(mysql_real_escape_string($_POST['username']), mysql_real_escape_string(md5($_POST['password']));
$sql="SELECT * FROM account WHERE `username` = '$data[0]';";
/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query)>0){
	$Arr=mysqli_fetch_assoc($query);
	if ($Arr['password'] != $data[1]){
		$data = array('message'=>$data[1]);
	}else{
		$data = array('message'=>"success");
	}
}else{
	$data = array('message'=>"error: no such user");
}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
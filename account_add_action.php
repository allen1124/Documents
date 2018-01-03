<?php
include("connect.php");
$data=array($_POST['cname'], $_POST['ename'], $_POST['gender'], $_POST['username'], md5($_POST['pwd']));


$sql="INSERT INTO account (cname, ename, username, password, gender) VALUES('$data[0]', '$data[1]', '$data[3]', '$data[4]', '$data[2]');";
/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
$check = "SELECT * FROM account WHERE username = '$data[3]';";
if (mysqli_num_rows(mysqli_query($conn, $check))>0){
	$data = array('error'=>'username used');
}else{
	if (mysqli_query($conn, $sql)){
		$data = array('success'=>'account created');
	}else{
		$data = array('error'=>$sql);
	}
}	
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
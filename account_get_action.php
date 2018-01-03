<?php
include("connect.php");
//echo $_POST["gid"];
$id = $_POST["cid"];
$sql="SELECT * FROM account WHERE `id` = '$id';";
/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query)>0){
	$Arr=mysqli_fetch_assoc($query);
	$data = array('cname'=>$Arr['cname'], 'ename'=>$Arr['ename'], 'gender'=>$Arr['gender'], 'username'=>$Arr['username'], 'pwd'=>$Arr['password']);
}else{
	$data = array('error'=>$sql);
}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
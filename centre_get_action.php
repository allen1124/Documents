<?php
include("connect.php");
//echo $_POST["gid"];
$cid = $_POST["cid"];
$sql="SELECT * FROM centre_list WHERE`cid` = '$cid';";
/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query)>0){
	$Arr=mysqli_fetch_assoc($query);
	$data = array('cname'=>$Arr['cname'], 'ename'=>$Arr['ename'], 'district'=>$Arr['district'], 'noOfClass'=>$Arr['class'], 'noOfGroup'=>$Arr['group']);
}else{
	$data = array('error'=>$sql);
}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
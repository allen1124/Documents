<?php
include("connect.php");
$Sid = $_POST["Sid"];
$sql="SELECT * FROM school_list where`Sid` = $Sid ;";
/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query)>0){
    $Arr=mysqli_fetch_assoc($query);
    $data = array('cname'=>$Arr['cname'], 'ename'=>$Arr['ename'], 'teacher_name'=>$Arr['teacher_name'], 'email_addr'=>$Arr['email_addr']);
}else{
    $data = array('error'=>$sql);
}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
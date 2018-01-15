<?php
include("connect.php");
$sid = $_POST["sid"];
$sql="SELECT * FROM student_list WHERE`sid` = '$sid';";
/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query)>0){
    $Arr=mysqli_fetch_assoc($query);
    $data = array('ename'=>$Arr['ename'], 'cname'=>$Arr['cname'], 'gender'=>$Arr['gender'], 'class'=>$Arr['class'], 'class_num'=>$Arr['class_num'], 'school'=>$Arr['school'], 'group'=>$Arr['gid']);
}else{
    $data = array('error'=>$sql);
}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
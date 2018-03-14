<?php
include("connect.php");
$data=array($_POST['Sid'], $_POST['cname'], $_POST['ename'], $_POST['teacher_name'], $_POST['teacher_name']);


$sql="UPDATE school_list SET `cname`='$data[1]', `ename`='$data[2]', `teacher_name`='$data[3]', `teacher_name`='$data[4]' WHERE `Sid`='$data[0]';";
/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
if (mysqli_query($conn, $sql)){
    $data = array('success'=>'1 row affected');
}else{
    $data = array('error'=>$sql);
}

$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
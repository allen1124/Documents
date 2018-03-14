<?php
include("connect.php");
$data=array($_POST['cname'], $_POST['ename'], $_POST['teacher_name'], $_POST['email_addr']);


$sql="INSERT INTO school_list (cname, ename, teacher_name, email_addr) VALUES('$data[0]', '$data[1]', '$data[2]', '$data[3]');";
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
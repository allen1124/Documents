<?php
include("connect.php");
$data=array($_POST['id'], $_POST['cname'], $_POST['ename'], $_POST['gender'], $_POST['class'], $_POST['classNo'], $_POST['school'], $_POST['centre'], $_POST['group']);
$gid = $data[7];
$sql="UPDATE student_list SET `cname`='$data[1]', `ename`='$data[2]', `gender`='$data[3]', `class`='$data[4]', `class_num`='$data[5]', `school`='$data[6]', `cid`='$data[7]', `gid`='$data[8]' WHERE `sid`='$data[0]';";

/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
if (mysqli_query($conn, $sql)){
    $data = array('success'=>'1 row affected');
    //Group Change Not Supported Yet
//    $sid = mysqli_insert_id($conn);
//    $sql2 = "SELECT * FROM lesson_list WHERE `gid` = $gid";
//    $lesson = mysqli_query($conn, $sql2);
//    while ($lessArr = mysqli_fetch_assoc($lesson)){
//        $lid = $lessArr['lid'];
//        $sql3 = "INSERT INTO att_list (sid, lid) VALUES($sid, $lid);";
//        if (mysqli_query($conn, $sql3)){
//            $data = array('message'=>'success');
//        }
//    }
}else{
    $data = array('error'=>$sql);
}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
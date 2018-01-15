<?php
    include("connect.php");
    $sid = $_POST['id'];
    $sql = "DELETE FROM student_list WHERE sid='$sid'";
    if (mysqli_query($conn, $sql)) {
        $data = array('success'=>'1 row deleted');
    } else {
        $data = array('error'=>$sql);
    }
    $resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
    echo $resultJSON;
?>

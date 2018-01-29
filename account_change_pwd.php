<?php
    include("connect.php");
    $id = $_POST['id'];
    $new_pwd = md5($_POST['pwd']);
    $sql="UPDATE account SET `password`='$new_pwd' WHERE `id`='$id';";
    if (mysqli_query($conn, $sql)){
        $data = array('success'=>'1 row affected');
    }else{
        $data = array('error'=>$sql);
    }
    $resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
    echo $resultJSON;
?>
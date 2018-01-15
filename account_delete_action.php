<?php
    include("connect.php");
    $id = $_POST['id'];
    $sql = "DELETE FROM account WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        $data = array('success'=>'1 row deleted');
    } else {
            $data = array('error'=>$sql);
    }
    $resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
    echo $resultJSON;
?>

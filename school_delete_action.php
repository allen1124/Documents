<?php
include("connect.php");
$Sid = $_POST['Sid'];
$sql = "DELETE FROM school_list WHERE Sid='$Sid'";
if (mysqli_query($conn, $sql)) {
    $data = array('success'=>'1 row deleted');
} else {
    $data = array('error'=>$sql);
}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>

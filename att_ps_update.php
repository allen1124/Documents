<?php
    include("connect.php");
    $lid = $_POST['lid'];
    $PS = $_POST['ps'];
    $i = 0;
    foreach($PS as $i=>$ps){
        $postscript = $ps['ps'];
        $sid = $ps['sid'];
        $updateSql="UPDATE att_list SET `ps`='$postscript' WHERE `sid`='$sid' AND `lid`='$lid';";
        if (mysqli_query($conn, $updateSql)){
            $data = array('success'=>'1 row affected','ps'=> "$ps" );
        }else{
            $data = array('error'=>$sql);
        }
    }
    $resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
    echo $resultJSON;
?>
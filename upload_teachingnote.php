<?php
    include("connect.php");
    $lid = $_POST['lid'];
    $sql="UPDATE lesson_list SET `upload`=1 WHERE `lid`='$lid';";
    $destination_path = getcwd().DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR;
    $data = array('result' => [], 'error' => [], 'sql' => '0');
    for($i = 0; $i < sizeof($_FILES['file']['name']); $i++){
        $target_path = $destination_path . basename($_FILES['file']['name'][$i]);
        if ( 0 < $_FILES['file']['error'][$i] ) {
            array_push($data['error'], $_FILES['file']['name'][$i]);
        }else {
            move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path);
            array_push($data['result'], $_FILES['file']['name'][$i]);
            if (mysqli_query($conn, $sql)){
                $data['sql'] = '1';
            }else{
                $data['sql'] = '0';
            }
        }
    }
    $resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
    echo $resultJSON;
?>
<?php
include("connect.php");
$sid=$_POST['sid'];
$lid=$_POST['lid'];

$result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM att_list WHERE `sid`='$sid' AND `lid`='$lid';"));
if ($result['att']==1){
	$updateSql="UPDATE att_list SET `att`=0 WHERE `sid`='$sid' AND `lid`='$lid';";
	$bool = 0;
}else{
	$updateSql="UPDATE att_list SET `att`=1 WHERE `sid`='$sid' AND `lid`='$lid';";
	$bool = 1;
}
/*for($j=0;$j<count($fieldArr);$j++)
    $sql=$sql.", ".$fieldArr[$j];
$sql=$sql.");";*/
	if (mysqli_query($conn, $updateSql)){
		$data = array('success'=>'1 row affected','bool'=> "$bool" );
	}else{
		$data = array('error'=>$sql);
	}

$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
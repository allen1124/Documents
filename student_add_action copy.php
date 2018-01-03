<?php
include("connect.php");
$dateArr=$_POST['dates'];
$errorSql[] = array();
$ok = true;
//$sql="ALTER TABLE `ssp`.`group_list` ADD COLUMN `group_listcol` VARCHAR(45) NULL ;";
for($j=0;$j<count($dateArr);$j++){
    $sql="ALTER TABLE `ssp`.`group_list` ADD COLUMN `$dateArr[$j]` VARCHAR(45) NULL DEFAULT '0';";
    if (!mysqli_query($conn, $sql)){
		$ok = false;
		$errorSql[] = $sql;
	}
}
if ($ok){
	$data = array('message'=>'success');
}else{
	$data = array('error'=>$errorSql);
}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>
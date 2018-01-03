<?php
session_start();
if(!( isset($_SESSION['UID']) && isset($_SESSION['mem_id']) )){
header("location:mem_reg.html");
die();
}
else{
	$required_UID=$_SESSION['UID'];
	$required_Mem_ID=$_SESSION['mem_id'];
	$memID=$_SESSION['mem_id'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

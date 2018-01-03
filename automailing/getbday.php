<?php
include "connect.php";
date_default_timezone_set('UTC');
$today = date('Y-m-d');

// $lessonArr = "SELECT `gid`, `ldate` FROM lesson_list WHERE DAY(ldate)=DAY(CURDATE()) AND MONTH(ldate)=MONTH(CURDATE());"
$testsql = "SELECT `gid`, `ldate` FROM lesson_list WHERE ldate='10/25/2017';";
$setcharset = mysqli_query($conn, "SET CHARACTER SET UTF8");
//$mysql= mysqli_query($conn,$fetchsql);
$mysql= mysqli_query($conn,$testsql);
if (mysqli_num_rows($mysql)>0){
 	while ($infoArr = $mysql->fetch_assoc()) {
  // include "bday_gmail.php";
  //echo $infoArr["nickname"];
  		$gid = $infoArr["gid"];
  		$gsql = mysqli_query($conn, "SELECT * FROM cllsc.student_list WHERE gid = $gid	;");
			while ($gArr = mysqli_fetch_assoc($gsql)){
				echo $gArr["ename"];
			}
			include "gmail.php"
	}
}else{
  echo "There is no lesson today";
}

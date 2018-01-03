<?php
include "connect.php";
date_default_timezone_set('UTC');
$today = date('Y-m-d');
//$fetchsql = "SELECT nickname, email , mem_id ,dob FROM MEMBER WHERE DAY(dob)=DAY(CURDATE()) AND MONTH(dob)=MONTH(CURDATE()) AND type='Full' ORDER BY DAY(dob);";
$testsql = "SELECT nickname, email , mem_id ,dob FROM MEMBER WHERE DAY(dob)=6 AND MONTH(dob)=3 AND type='Full' ORDER BY DAY(dob);";
$mysql= mysqli_query($conn,$testsql);
if (mysqli_num_rows($mysql)>0){

  while ($infoArr = $mysql->fetch_assoc()) {
    for ($i=0; $i<=20; $i++){
      //include "bday_gmail.php";
      echo $infoArr["nickname"];
      echo $infoArr["email"];
  }
  }
}else{
  echo "There is no one birthday today";
}

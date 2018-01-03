
<?php
//header('Content-type: application/json');
foreach ($filteredArr as $i) {
 if ($i != " " && !empty($i)){
  $sql = "SELECT * FROM ccpang.9grade_list WHERE word = '$i'; ";
  //echo $sql;
  $mysql = mysqli_query($conn, $sql);
  //echo $conn;
  //echo mysqli_num_rows($mysql);
  $info = mysqli_fetch_assoc($mysql);
  if ($mysql && mysqli_num_rows($mysql)>0){
    switch ($info['grade']){
      case 1: $Arr1[] = $info; break;
      case 2: $Arr2[] = $info; break;
      case 3: $Arr3[] = $info; break;
      case 4: $Arr4[] = $info;  break;
      case 5: $Arr5[] = $info; break;
      case 6: $Arr6[] = $info;  break;
      case 7: $Arr7[] = $info; break;
      case 8: $Arr8[] = $info; break;
      case 9: $Arr9[] = $info; break;
      /*case 1: $Arr1[] = $info['word']; break;
      case 2: $Arr2[] = $info['word'];  break;
      case 3: $Arr3[] = $info['word'];  break;
      case 4: $Arr4[] = $info['word'];  break;
      case 5: $Arr5[] = $info['word']; break;
      case 6: $Arr6[] = $info['word'];  break;
      case 7: $Arr7[] = $info['word'];  break;
      case 8: $Arr8[] = $info['word'];  break;
      case 9: $Arr9[] = $info['word'];  break;*/
    }

  }

}
}
/*if (!empty($Arr1)){
  echo '</br> 一年級</br>';
  foreach ($Arr1 as $x){
    echo $x;
  }
}
if (!empty($Arr2)){
  echo '</br> 二年級</br>';
  foreach ($Arr2 as $x){
    echo $x;
  }
}
if (!empty($Arr3)){
  echo '</br> 三年級</br>';
  foreach ($Arr3 as $x){
    echo $x;
  }
}
if (!empty($Arr4)){
  echo '</br> 四年級</br>';
  foreach ($Arr4 as $x){
    echo $x;
  }
}
if (!empty($Arr5)){
  echo '</br> 五年級</br>';
  foreach ($Arr5 as $x){
    echo $x;
  }
}
if (!empty($Arr6)){
  echo '</br> 六年級</br>';
  foreach ($Arr3 as $x){
    echo $x;
  }
}
if (!empty($Arr7)){
  echo '</br> 中一級</br>';
  foreach ($Arr7 as $x){
    echo $x;
  }
}
if (!empty($Arr8)){
  echo '</br> 中二級</br>';
  foreach ($Arr8 as $x){
    echo $x;
  }
}
if (!empty($Arr9)){
  echo '</br> 中三級</br>';
  foreach ($Arr9 as $x){
    echo $x;
  }
}*/

$data = array('total'=>$count, 'count'=>count($filteredArr), 'p1'=> $Arr1, 'p2'=>$Arr2, 'p3'=>$Arr3, 'p4'=>$Arr4, 'p5'=>$Arr5, 'p6'=>$Arr6, 'p7'=>$Arr7, 'p8'=>$Arr8, 'p9'=>$Arr9);
//$resultArr = array(count($filteredArr),$Arr1, $Arr2, $Arr3, $Arr4, $Arr5, $Arr6, $Arr7, $Arr8, $Arr9);
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
//echo "";
?>

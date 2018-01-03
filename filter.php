<?php
//header('Content-Type: text/html; charset=utf-8');
header('Content-type: application/json; charset=utf-8');
include 'connect.php';
$filteredArr[] = null;
$foo = true;
//$required_Mem_ID
$result = $_POST['input'];
//echo $result;
if(!empty($result)){
  //$arr = mb_split($result);
  $count = preg_match_all('/./u', $result, $arr);
  echo "\n";
  foreach ($arr[0] as $i) {
    $found = array_search($i, $filteredArr);
    if (!$found){
      $filteredArr[] = $i;
    }
    //echo $i;
  }
  //echo '不重覆字:';
  //echo count($filteredArr);
  //echo "\n";
  include 'analyse_action.php';
}

?>

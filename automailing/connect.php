
<?php

$conn = new mysqli("www.cllscssp.hku.hk","cllsc","md7LyifEVD","cllsc");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>

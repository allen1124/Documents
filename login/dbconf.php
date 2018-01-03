<?php
//DATABASE CONNECTION VARIABLES
$host = "www.cllscssp.hku.hk"; // Host name
$username = "cllsc"; // Mysql username
$password = "md7LyifEVD"; // Mysql password
$db_name = "cllsc"; // Database name

//DO NOT CHANGE BELOW THIS LINE UNLESS YOU CHANGE THE NAMES OF THE MEMBERS AND LOGINATTEMPTS TABLES

$tbl_prefix = ""; //***PLANNED FEATURE, LEAVE VALUE BLANK FOR NOW*** Prefix for all database tables
$tbl_members = $tbl_prefix."account";
$tbl_attempts = $tbl_prefix."login_log";

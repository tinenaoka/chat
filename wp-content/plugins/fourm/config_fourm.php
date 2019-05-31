<?php
error_reporting(0);
include_once './wp-config.php';
$mysqli=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$mysqli->set_charset('utf8');
?>
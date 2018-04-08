<?php
/**
* Created by PhpStorm.
* User: dkliukin
* Date: 4/6/18
* Time: 7:00 PM
*/
session_start();
$_GET['logout'] == 'logout';
if ($_GET['logout'] && $_GET['logout'] == 'logout') {
   $_SESSION = array();
}
$_SESSION = array();
$url = "http://localhost:8100/";
header('Location: ' . $url);
?>
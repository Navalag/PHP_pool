<?php
/**
 * Created by PhpStorm.
 * User: dkliukin
 * Date: 4/6/18
 * Time: 7:00 PM
 */
session_start();
if ($_POST['logout'] && $_POST['logout'] == 'logout') {
    $_SESSION = array();
}

?>
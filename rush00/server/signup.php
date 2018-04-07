<?php
/**
 * Created by PhpStorm.
 * User: dkliukin
 * Date: 4/7/18
 * Time: 3:44 PM
 */
$servername = "localhost";
$username = "web";
$password = "1234";
$databasename = "foodshop";
/**
 * email must be unique!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */
$userexist = false;
if ($_POST['f_name'] && $_POST['s_name'] && $_POST['tel_2'] && $_POST['address'] && $_POST['passwd_2'] && $_POST['conf_passwd'] && $_POST['submit_reg'] && $_POST['submit_reg'] == "Send") {
    $connect = mysqli_connect($servername, $username, $password, $databasename);
    if ($connect) {
        $result = mysqli_query($connect, "SELECT * FROM users WHERE UserID=3"); // запрос на выборку
        $data = mysqli_fetch_array($result);
        do {
            if ($data['PhoneNumber'] == $_POST['tel_2']) {
                echo 'User with phone:'.$data['PhoneNumber'].'Already Exsists!<br/><button><a href="http://localhost:8100/rush00/index.php">Back</a></button>';
                $userexist = true;
            }
        } while ($data = mysqli_fetch_array($result));
        if ($userexist == false) {
            if ($_POST['passwd_2'] == $_POST['conf_passwd']) {
                $query = "INSERT INTO users(FirstName, SecondName, Password, PhoneNumber, Address)
                VALUES ('" . $_POST['f_name'] . "', '" . $_POST['s_name'] . "', '" . hash('sha256',$_POST['passwd_2']) . "', '" . $_POST['tel_2'] . "', '" . $_POST['address'] . "');";
                mysqli_query($connect, $query);
            } else {
                echo 'Password Error! Passwords are not euqales!<br/><button><a href="http://localhost:8100/rush00/index.php">Back</a></button>';
            }
        }
    }
    else {
        echo 'Connection Faild!<br/><button><a href="http://localhost:8100/rush00/index.php">Back</a></button>';
    }
}
else {
    echo 'Fill all boxes before sign up!<br/><button><a href="http://localhost:8100/rush00/index.php">Back</a></button>';;
}
mysqli_close($connect);
?>
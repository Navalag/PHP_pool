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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tel = trim(filter_input(INPUT_POST,"tel",FILTER_SANITIZE_STRING));
    $passwd = trim(filter_input(INPUT_POST,"passwd",FILTER_SANITIZE_EMAIL));

    if ($tel == "" || $passwd == "") {
        header("location:http://localhost:8100/suggest.php?status=wrong_data");
    }
}
if ($_POST['tel'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] == "Send")
{
    $connect = mysqli_connect($servername, $username, $password, $databasename);
    if ($connect) {
        $result = mysqli_query($connect, "SELECT * FROM users"); // запрос на выборку
        $data = mysqli_fetch_array($result);
        do {
            if ($data['PhoneNumber'] == $_POST['tel']) {
                session_start();
                $_SESSION['Phone'] = $data['PhoneNumber'];
                if ($data['Password'] == hash('sha256',$_POST['passwd']))
                {
                    session_start();
                    $_SESSION['User'] = $data['FirstName']." ".$data['SecondName'];
                    $_SESSION['AdminStatus'] = $data['AdminStatus'];
                    header("location:http://localhost:8100/suggest.php?status=success");
                }
                else {
                    break;
                }
            }
        }while ($data = mysqli_fetch_array($result));
        if ($_SESSION['User'] == "") {
            $_SESSION['Phone'] = "";
            header("location:http://localhost:8100/suggest.php?status=wrong_passw");
        }
    }
    else {
        header("location:http://localhost:8100/suggest.php?status=wrong_connection");
    }
}
mysqli_close($connect);
?>
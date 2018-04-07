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
if ($_POST['tel'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] == "Send")
{
    $connect = mysqli_connect($servername, $username, $password, $databasename);
    if ($connect) {
        $result = mysqli_query($connect, "SELECT * FROM users"); // запрос на выборку
        $data = mysqli_fetch_array($result);
        do {
//            echo "<br/> UserID: " . $data['UserID'] . "<br/> User Name:" . $data['FirstName'] . "<br/> User Last Name: " . $data['SecondName'] . "<br/> NUMBER: " . $data['PhoneNumber'] . "<br/>";
            if ($data['PhoneNumber'] == $_POST['tel']) {
                if ($data['Password'] == hash('sha256',$_POST['passwd']))
                {
                    session_start();
                    $_SESSION['User'] = $data['FirstName']." ".$data['SecondName'];
                    $_SESSION['Phone'] = $data['PhoneNumber'];
                    echo "OK! TY FOR LOG IN";
                }
                else {
                    echo 'Wrong Password!<br/><button><a href="http://localhost:8100/rush00/index.php">Back</a></button>';
                }
            }
            else{
                echo 'User with phone:'.$data['PhoneNumber'].' didnt exsist!<br/><button><a href="http://localhost:8100/rush00/index.php">Back</a></button>';
            }
        } while ($data = mysqli_fetch_array($result));
    }
    else {
        echo 'Connection Faild!<br/><button><a href="http://localhost:8100/rush00/index.php">Back</a></button>';
    }
}
else {
    echo 'Fill phone number and password!!<br/><button><a href="http://localhost:8100/rush00/index.php">Back</a></button>';;
}
mysqli_close($connect);
?>
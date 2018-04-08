<?php

if ($_POST['Remove'] && $_POST['Remove'] == 'Remove')
{
    $UserID=$_POST['UserID'];
    $ProdID = $_POST['ProductID'];
    $catID = $_POST['catID'];
    $servername = "localhost";
    $username = "web";
    $password = "1234";
    $databasename = "foodshop";
    $connect = mysqli_connect($servername, $username, $password, $databasename);
    $query = "DELETE FROM basket WHERE UserID=".$UserID." AND ProductID=".$ProdID." AND category='".$catID."';";
    mysqli_query($connect,$query);
    header("location:http://localhost:8100/basket.php");
}
?>
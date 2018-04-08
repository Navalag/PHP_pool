<?php

$servername = "localhost";
$username = "web";
$password = "1234";
$databasename = "foodshop";
$connect = mysqli_connect($servername, $username, $password, $databasename);
echo $_POST['category'];
if ($_POST['category'] == 'book') {
    $query = "INSERT INTO book(title, img, Price, year, genre, category, format, authors, publisher, isbn) 
VALUES ('".$_POST['title']."','".$_POST['img']."','".$_POST['Price']."','".$_POST['year']."','".$_POST['genre']."','".$_POST['category']."','".$_POST['format']."','".$_POST['authors']."','".$_POST['publisher']."','".$_POST['isbn']."');";
    mysqli_query($connect, $query);
    echo $query;
}
elseif ($_POST['category'] == 'movie') {
    $ruery = "INSERT INTO movie(title, img, Price, year, genre, format, category, writers, director, stars) VALUES ('".$_POST[title]."','".$_POST[img]."','".$_POST[Price]."','".$_POST[year]."','".$_POST[genre]."','".$_POST[format]."','".$_POST[category]."','".$_POST[writers]."','".$_POST[director]."','".$_POST[stars]."');";
    ysqli_query($connect, $ruery);
    echo $ruery;
}
else{
    header("location:http://localhost:8100/admin.php");
}
?>
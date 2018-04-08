<?php
include("inc/functions.php");

include("inc/header.php"); ?>

<div class="section catalog page">
    <div class="wrapper">

        <h1><?php
            echo "<a>ADMIN</a> ";
            echo $pageTitle; ?></h1>

        <ul class="items">
            <?php
            session_start();
            $servername = "localhost";
            $username = "web";
            $password = "1234";
            $databasename = "foodshop";
            $connect = mysqli_connect($servername, $username, $password, $databasename);

            echo "<form align='center' method='post' action='addart.php'><ul>";
            echo "<input type='text' name='Category' value='Category'>";
            echo "<input type='submit' name='ADD ARTICLE' value='ADD ARTICLE'>";
            echo "</ul></form>";
            echo "<form align='center' method='post' action='del_item.php'><ul>";
            echo "<input type='submit' name='MODIFY' value='MODIFY'>";
            echo "</ul></form>";
            echo "<form align='center' method='post' action='removearticle.php'><ul>";
            echo "<input type='submit' name='REMOVE ARTICLES' value='REMOVE ARTICLES'>";
            echo "</ul></form>";
            echo "<form align='center' method='post' action='moduser.php'><ul>";
            echo "<input type='text' name='tel' value='tel'>";
            echo "<input type='submit' name='MODIFY USER' value='MODIFY USER'>";
            echo "</ul></form>";
            echo "<form align='center' method='post' action='basketadm.php'><ul>";
            echo "<input type='submit' name='Products for users' value='Products for users'>";
            echo "</ul></form>";
            $req = "SELECT * FROM users";
            $res = mysqli_query($connect, $req);
            while ($item = mysqli_fetch_array($res))
            {
                echo "UserID: ".$item['UserID']." Name: ".$item['FirstName']." Phone Number: ".$item['PhoneNumber']." Admin Status: ".$item['AdminStatus']."<br/>";
            }
            mysqli_close($connect);
            ?>
        </ul>

    </div>
</div>


<?php include("inc/footer.php"); ?>

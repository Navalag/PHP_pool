<?php

include("inc/header.php"); ?>

<div class="section catalog page">
    <div class="wrapper">

        <h1><?php
            echo "<a>Basket</a> ";
            echo $pageTitle; ?></h1>

        <ul class="items">
            <?php
            session_start();
            $servername = "localhost";
            $username = "web";
            $password = "1234";
            $databasename = "foodshop";
            $connect = mysqli_connect($servername, $username, $password, $databasename);
            if ($connect) {
                $query = "SELECT * FROM basket;";
                if ($result = mysqli_query($connect, $query))
                    while ($data = mysqli_fetch_array($result)) {
                        echo "UserID: ".$data["UserID"]."      Name: ".$data['Name']."      Phone: ".$data['phone']."      Category: ".$data['category']."      ProductID: ".$data['ProductID']."<br/>";
                    }
            }
            ?>
        </ul>

    </div>
</div>

<?php include("inc/footer.php"); ?>
?>
<?php
require("inc/functions.php");
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
                        $summ = 0;
                        $totalamount = 0;
                        $query = "SELECT * FROM basket WHERE phone='".$_SESSION['Phone']."';";
                        if ($result = mysqli_query($connect, $query))
                        while ($data = mysqli_fetch_array($result)) {
                            switch ($data['category']) {
                                case('music'): {
                                    $IDname = "musicID";
                                }
                                    break;
                                case ('movie'): {
                                    $IDname = "movieID";
                                }
                                    break;
                                case ('book'): {
                                    $IDname = "BookID";
                                }
                                    break;
                            }
                            $req = "SELECT * FROM " . $data['category'] . " WHERE ".$IDname."=".$data['ProductID'].";";
                            $res = mysqli_query($connect, $req);
                            $item = mysqli_fetch_array($res);
                            echo "Price:".$item['Price'];
                            echo " amount: 1";
                            $summ += $item['Price'];
                            $totalamount++;
                            echo "<form align='center' method='post' action='del_item.php'><ul>";
                            echo get_item_html($data['ProductID'], $item);
                            echo "<input type='submit' name='Remove' value='Remove'>";
                            echo "<input style='display: none' type='text' name='UserID' value=".$data['UserID'].">";
                            echo "<input style='display: none' type='text' name='ProductID' value=".$data['ProductID'].">";
                            echo "<input style='display: none' type='text' name='catID' value=".$data['category'].">";
                            echo "</ul></form>";
                        }

                    echo "Amount of products: ".$totalamount." Total cost:".$summ;
                    }

                    mysqli_close($connect);
                ?>
            </ul>

        </div>
    </div>

<?php include("inc/footer.php"); ?>
<?php

require_once 'Rest.php';

$url = "http://localhost/GloryFlorist/Controllers/WebServices/orderHistory.php";
$rest = new Rest($url);
$itemUrl = "orderHistory.php?id=";
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../CSS/orderHistory.css">
        <title>Order History</title>
    </head>
    <body>
        <div id="container">
            <div id="top">
                <label id="title">Recent Purchases</label>
                <label>Powered by GloryFlorist API</label>
            </div>
            <div id="content">

                <?php
                foreach ($rest->getData() as $orderhistory) {
                    echo '<a href="' . $itemUrl . $orderhistory->id . '">' .
                    '<div class="item">' .
                    '<div class="img">' .
                    '<img id="img" name="img" src=" ' . $orderhistory->img . ' ">' .
                    '</div>' .
                    '<div class="label">' .
                    '<label class="name">Name : ' . $orderhistory->name . '</label><br />' .
                    '<label class="name">Price : ' . $orderhistory->price . '</label><br />' .
                    '<label class="name">Stalks : ' . $orderhistory->stalks . '</label><br />' .
                    '</div>' .
                    '</div>' .
                    '</a>';
                }
                ?>
            </div>
    </body>
</html>
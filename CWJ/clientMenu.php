<?php

require_once 'REST.php';

$url = "http://localhost/GloryFlorist/Controllers/WebServices/getFlowerArrangement.php";

$rest = new Rest($url);

$itemUrl = "clientMain.php?id=";
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../CSS/clientMenu.css">
        <title>Price Estimator</title>
    </head>
    <body>
        <div id="container">
            <div id="top">
                <label id="title">Price Estimator</label>
                <label>Powered by GloryFlorist API</label>
                <label id="msg">Please select one of the product</label>
            </div>
            <div id="content">

                <?php
                foreach ($rest->getArrangement() as $arrangement) {
                    echo '<a href="' . $itemUrl . $arrangement->id . '">' .
                    '<div class="item">' .
                    '<div class="img">' .
                    '<img id="img" name="img" src=" ' . $arrangement->imageURL . ' ">' .
                    '</div>' .
                    '<div class="label">' .
                    '<label class="name">' . $arrangement->name . '</label><br />' .
                    '<label>Consist of ' . $arrangement->flowerName . '</label>' .
                    '</div>' .
                    '</div>' .
                    '</a>';
                }
                ?>
            </div>
    </body>
</html>
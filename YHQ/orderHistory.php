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
            </div>
            <div id="content">

                <?php
                if ($rest->getData()) {

                    foreach ($rest->getData() as $orderitem) {
                        $arrangementRest = new Rest("http://localhost/GloryFlorist/Controllers/WebServices/searchArrangement.php?arrangementId=" . $orderitem->arragement);
                        if ($arrangementRest->getData()) {
                            $arrangementData = $arrangementRest->getData();

                            echo '<a href="' . $itemUrl . $arrangementData->id . '">' .
                            '<div class="item">' .
                            '<div class="img">' .
                            '<img id="img" name="img" src=" ' . $arrangementData->image_url . ' ">' .
                            '</div>' .
                            '<div class="label">' .
                            '<label class="name">Name : ' . $arrangementData->name . '</label><br />' .
                            '<label class="name">Price : RM ' . $arrangementData->price . '</label><br />' .
                            '<label class="name">Stalks : ' . $arrangementData->stalks . '</label><br />' .
                            '<label class="name">Quantity : ' . $orderitem->quantity . '</label><br />' .
                            '</div>' .
                            '</div>' .
                            '</a>';
                        }
                    }
                } else {
                    echo "no purchases yet";
                }
                ?>
            </div>
    </body>
</html>
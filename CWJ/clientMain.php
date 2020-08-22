<?php
require_once 'REST.php';

$id = $_GET['id'];

$url = "http://localhost/GloryFlorist/Controllers/WebServices/getFlowerArrangement.php";

$rest = new Rest($url);

$itemUrl = "https://localhost/GloryFlorist/Views/floral%28Cust%29.php?id=";
foreach ($rest->getArrangement() as $arrangement) {
    if ($id == $arrangement->id) {
        $imageURL = $arrangement->imageURL;
        $name = $arrangement->name;
        $price = $arrangement->price;
    }
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../CSS/clientMain.css">
        <title>Price Estimator</title>
    </head>

    <body>
        <div id="container">
            <div id="top">
                <label id="title">Price Estimator</label>
                <label>Powered by GloryFlorist API</label>
                <label id="msg">Please enter an amount of the quantity</label>
            </div>
            <div id="content">
                <div id="floral">
                    <div class="img">
                        <img id="img" src="<?php echo $imageURL; ?>">
                    </div>
                    <div id="label">
                        <label class="name"><?php echo $name; ?></label><br />
                        <label>RM <?php echo number_format($price, 2); ?> ea</label><br /><br />
                        <input type="hidden" id="price" value="<?php echo $price; ?>" />
                        <label>Quantity</label><br />
                        <input type="number" id="quantity" style="text-align: center;" value="0" oninput="checkPrice()" /><br/><br/>
                        <label>Total</label><br/>
                        <label id="result">RM 0.00</label>
                    </div>
                    <div id="button">
                        <a href="<?php echo $itemUrl . $id; ?>" id="go_button">Go to store</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        function checkPrice() {
            var x = document.getElementById("quantity").value;
            var y = document.getElementById("price").value;;

            document.getElementById("result").innerHTML = "RM " + parseFloat((x * y)).toFixed(2);
        }
    </script>
</html>
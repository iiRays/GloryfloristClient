<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once("Rest.php");
        
            $rest = new Rest("http://localhost/GloryFlorist/Controllers/WebServices/searchOrder.php?" . "orderId=1"); // adding query parameter manually to debug
            $orderData = $rest->getData();
            
            if ($rest->getData()) {
                $orderData = $rest->getData();
                foreach ($orderData as $orderDetail) {
                    echo $orderDetail . "<br>";
                }
            }
        ?>
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../CSS/searchOrderResults.css">
        <title>Order Searcher Results</title>
    </head>
    <body>

      <div id='overlay'></div>

      <form id='container'>

        <a href='searchOrder.php' id='back'>&lt; BACK</a>

        <a id='heading'>Order Searcher results</a>
        
        <?php
            require_once("RestUtil.php");
            
            if (!isset($_POST["orderId"])) {
                echo "<a id='info'>No order with a matching ID was found ಠ_ಠ</a>";
            } else {
                $orderId = $_POST["orderId"];
                
                $rest = new RestUtil("http://localhost/GloryFlorist/Controllers/WebServices/searchOrder.php?orderId=".$orderId); // adding query parameter manually to debug
                $orderDetails = $rest->getData();
                $labels = ["ID", "CUSTOMER ID", "GRAND TOTAL", "STATUS"];

                if ($rest->getData()) {
                    $orderData = $rest->getData();

                    echo "<a id='info'>An order with a matching ID was found (ᵔᴥᵔ)</a>";

                    $i = 0;
                    foreach ($orderData as $orderDetail) {
                        
                        if ($i == 4) {
                            // display nothing
                        } else if ($i == 2) {
                            echo "<div class='item'>
                                <a class='label'>".$labels[$i]."</a>
                                <a class='value'>RM ".$orderDetail."</a>
                              </div>";
                        } else {
                            echo "<div class='item'>
                                <a class='label'>".$labels[$i]."</a>
                                <a class='value'>".$orderDetail."</a>
                              </div>";
                        }
                        $i++;
                    }

                    $itemRest = new RestUtil("http://localhost/GloryFlorist/Controllers/WebServices/searchOrderItems.php?orderId=".$orderId);

                    if ($itemRest->getData()) {
                        $orderItems = $itemRest->getData();

                        echo "<div class='item'>
                                <a class='label'>ORDER ITEMS</a>
                                <a class='value' style='font-size: 25px; line-height: 20px;'>";

                        foreach ($orderItems as $orderItem) {
                            $arrangementRest = new RestUtil("http://localhost/GloryFlorist/Controllers/WebServices/searchArrangement.php?arrangementId=".$orderItem->arrangement_id);

                            if ($arrangementRest->getData()) {
                                $arrangementData = $arrangementRest->getData();

                                echo $orderItem->quantity."x ".$arrangementData->name."<br>";
                            }
                        }

                        echo "</a></div>";
                    }
                } else {
                    echo "<a id='info'>No order with a matching ID was found ಠ_ಠ</a>";
                }
                
            }
        ?>

      </form>

    </body>
</html>

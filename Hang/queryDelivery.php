
<!DOCTYPE html>
<!--
Author: kelvin tham yit hang
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../CSS/queryDelivery.css" rel="stylesheet"/>
        <title>Delivery Query Result</title>
    </head>
    <body>
        <div id="container">
            <h1 class="content">Delivery Info Web Service Client </h1>
            <h2 class="content">Powered by Glory Florist</h2>
            <form method="post" action="deliveryQueryResult.php">
                <div class="content">
                    <p>Select date range and click "go" to view </p>
                    <div class="input">
                        <label for="start">Start Date: </label>
                        <input type="date" name="start" value="">
                    </div>
                    <div class="input">
                        <label for="end">End Date   : </label>
                        <input type="date" name="end" value="">
                    </div>
                    <div>
                        <input type="submit" value="submit" name="submit" class="button"/>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>




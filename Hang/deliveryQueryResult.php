<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../CSS/deliveryQueryResult.css" rel="stylesheet"/>
        <title>Delivery Query Result</title>
    </head>
    <body>
        <h1>Delivery Query Result</h1>
        <p><a href="queryDelivery.php">Back to previous page</a></p>
        <div id="content">
            <?php
            if (isset($_POST['submit'])) {
                $start = $_POST['start'];
                $end = $_POST['end'];

                require_once("Rest.php");
                $rest = new Rest("http://localhost/gloryflorist/Controllers/WebServices/queryDelivery.php?start=" . $start . "&end=" . $end);

                $array = (array) $rest->getData();
                if (count($array) == 0) {

                    echo "<p>NO RECORDS FOUND</p>";
                    
                    
                } else {
                    echo "<table border='1'>
                    <tr>
                        <th>Id</th>
                        <th>Sender</th>
                        <th>Sendercontact</th>
                        <th>Recipient </th>
                        <th>Recipientcontact</th>
                        <th>Method </th>
                        <th>Date</th>
                        <th>Timeslot</th>
                        <th>Address</th>
                        <th>Company/th>
                        <th>Asset type  </th>
                        <th>City/town</th>
                        <th>Postcode</th>
                        <th>Delivery fee</th>                       
                    </tr>";
                    foreach ($array as $a) {

                        echo "<tr>";
                        echo "<td>" . $a->id . "</td>"
                        . "<td>" . $a->sender . "</td>"
                        . "<td>" . $a->sendercontact . "</td>"
                        . "<td>" . $a->recipient . "</td>"
                        . "<td>" . $a->recipientcontact . "</td>"
                        . "<td>" . $a->method . "</td>"
                        . "<td>" . $a->date . "</td>"
                        . "<td>" . $a->timeslot . "</td>"
                        . "<td>" . $a->address . "</td>"
                        . "<td>" . $a->company . "</td>"
                        . "<td>" . $a->asset_type . "</td>"
                        . "<td>" . $a->city_town . "</td>"
                        . "<td>" . $a->postcode . "</td>"
                        . "<td>" . $a->deliveryfee . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
            ?></div>
    </body>
</html>

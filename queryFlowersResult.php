<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="CSS/queryFlowersResult.css" rel="stylesheet"/>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>
            Flower Arrangement Searcher
        </h1>
        <h2>
            Powered by GloryFlorist API
        </h2>

        <div class="results">
            <?php
            require_once("Rest.php");
            $minVal = (int) isset($_POST["minPrice"]) ? $_POST["minPrice"] : null;
            $maxVal = (int) isset($_POST["maxPrice"]) ? $_POST["maxPrice"] : null;
            $minChecked = isset($_POST["minPriceCheck"]) ? $_POST["minPriceCheck"] : null;
            $maxChecked = isset($_POST["maxPriceCheck"]) ? $_POST["maxPriceCheck"] : null;
            $queryCount = 0;
            $query = "";

            if ($minVal && $minChecked) {
                $queryCount++;
                $query .= "minPrice=" . ($minVal * 50);
            }


            if ($maxVal & $maxChecked) {
                // If query count already 1,then add hash (&)
                if ($queryCount == 1) {
                    $query .= "&";
                }

                $queryCount++;
                $query .= "maxPrice=" . ($maxVal * 50);
            }
            $rest = new Rest("http://localhost/GloryFlorist/Controllers/WebServices/queryArrangements.php?" . $query);


            if ($rest->getData()) {
                // Data is retrieved
                foreach ($rest->getData() as $arrangement) {
                    
                    $link = "https://localhost/GloryFlorist/Views/floral%28Cust%29.php?id={$arrangement->id}";

                    echo "<a href='{$link}'>
                <div class='result'>
                    <img class='arrangementImg' src='{$arrangement->img}' />
                    <div class='flowerInfo'>
                        <div class='arrangementTitle'>
                            {$arrangement->name}
                        </div>
                        <div class='flowerName'>
                            {$arrangement->flower->flowerName} x {$arrangement->stalks}
                        </div>
                        <br/>
                        <div class='price'>
                            RM{$arrangement->price}
                        </div>
                    </div>
                </div>
            </a>";
                }
            } else {
                // There is no data
                echo "<h3>It seems like no floral arrangements could be found</h3>";
            }
            ?>






        </div>
    </body>

</html>

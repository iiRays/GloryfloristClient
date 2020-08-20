<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once("Rest.php");
        $rest = new Rest("http://localhost/GloryFlorist/Controllers/WebServices/queryArrangements.php?minPrice=10");
        echo var_dump($rest->getData());
        ?>
    </body>
</html>

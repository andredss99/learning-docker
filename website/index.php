<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $result = file_get_contents("http://node-container:9001/products");
        $products = json_decode($result);

        foreach ($product as $key => $value) {
            echo $key . ": " . $value . "<br>";
        }
    ?>
</body>
</html>
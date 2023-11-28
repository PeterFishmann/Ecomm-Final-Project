<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features of your car</title>
</head>
<?php
    include 'View/includes/style.php';
    include 'View/includes/header.php';
    ?>
<body>
    <div class="container">
        <div class="button">
            <a href="/order/insert/<?=$data['feat'][0]->car_id?>">Back to the previous page</a>
        </div>
        <div class="img">
            <img src="../../Images/cars/<?=$data['feat'][0]->picture?>">
        </div>
        <div class="feat">
        <ul>
            <?php
            foreach($data['feat'] as $car){
            ?>
            <li>
                <h5><b><?=$car->features?></b></h5>
                <p><?=$car->description?></p>
            </li>
            <?php
            }
            ?>
        </ul>
        </div>
    </div>
</body>
</html>
<style>
body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            margin: 20px auto;
            border: 1px solid #333;
            border-radius: 15px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .img {
            border-bottom: 1px solid #333;
            text-align: center;
            padding: 20px;
        }

        .img img {
            border: 1px solid #333;
            width: 250px;
            height: 250px;
            border-radius: 50%;
        }

        .feat ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .feat li {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        h5 {
            margin: 0;
        }

</style>
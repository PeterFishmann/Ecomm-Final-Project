<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Index</title>
    <?php
        include 'View/includes/style.php';
    ?>
</head>
<body>
<?php
include 'View/includes/header.php';
?>
    <h1>Review terms</h1>
    <div class="list">
    <ul>
        <?php foreach ($data['review'] as $rev): ?>
            <li>
                <p class="stars">&#9733; <?=$rev->stars?></p>
                <p><?=$rev->term?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    </div>
</body>
</html>
<style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        .list li {
            background-color: #fff;
            margin: 10px;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        p {
            margin: 0;
        }

        .stars {
            font-size: 20px;
            color: #ffac00;
            margin-bottom: 10px;
        }
    </style>
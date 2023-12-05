<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <?php
    include 'View/includes/style.php';
    ?>
</head>
<body>
    <?php
    include 'View/includes/header.php';
    date_default_timezone_set('America/Toronto');
    if(!is_array($data)){
        echo "<div class='alert alert-warning' role='alert'>$data</div>";
    }
    ?>
<div class="container">
    <form action="" method="post">
    <div class="input">
            <input type="hidden" value="<?=$_SESSION['id']?>" name="id">
        </div>    
    <div class="input">
            <label>Username:</label><br>
            <input type="text" value="<?=$_SESSION['username']?>" disabled>
        </div>
    <div class="input">
            <label>Comment:</label><br>
            <textarea rows="4" cols="50" name="comment" placeholder="Write your comment here"></textarea>
        </div>
        <div class="input">
            <label>Date:</label><br>
            <input type="text" name="date" value="<?php echo date('Y-m-d')?>" readonly>
        </div>

        <div class="input">
            <label>Receiver:</label><br>
            <input type="text" name="rec" value="<?=$data[1]->username?>" readonly>
        </div>
        <div class="input">
            <label>Car:</label><br>
            <input type="text" name="car" value="<?= $data[0]->make." ".$data[0]->model?>" readonly>
        </div>
        <div class="input">
            <input type="submit" name="com" value="Publish">
        </div>
    </form>
</div>
</body>
</html>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top:10px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        .input {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
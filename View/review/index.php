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
    <?php
    if(isset($_SESSION['username']) && $_SESSION['right'] == "Admin"){
        ?><a href="/review/insert" class="btn btn-primary btn-sm">Add</a><?php
    }
    ?>
    <div class="list">
    <ul>
        <?php foreach ($data['review'] as $rev): ?>
            <li>
                <p class="stars">&#9733; <?=$rev->stars?></p>
                <p><?=$rev->term?></p>
                <?php
                if(isset($_SESSION['username']) && $_SESSION['right'] == "Admin"){
                ?>
                <form method="post">
                    <a href="/review/edit/<?=$rev->id?>" class="btn btn-success btn-sm">Edit</a>
                    <input type="hidden" name="id" value="<?=$rev->id?>">
                    <input type="submit" class="btn btn-danger btn-sm" name="delete" value="Delete">
                </form>
                <?php
                }                
                ?>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($_SESSION['username']) ?></title>
</head>
<body>
    <?php 
    include "View/includes/header.php"; 
    include "View/includes/style.php";
    ?>
    <div class="form">
        <form method="post">
            <select name="rev">
                <?php foreach ($data as $rv): ?>
                    <option value='<?= htmlspecialchars($rv->id) ?>'>
                        (<?= htmlspecialchars($rv->stars) ?>&#9733;) <?= htmlspecialchars($rv->term) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <h5>Write a comment (Optional):</h5>
            <label for="com">Comment:</label><br>
            <textarea name="com" cols="30" rows="10"></textarea><br>
            <input type="submit" name="write" value="Post">
        </form>
    </div>
</body>
</html>
<style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: lightgrey;
        }
        .form {
            max-width: 600px;
            margin: 20px auto;
            background-color: grey;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
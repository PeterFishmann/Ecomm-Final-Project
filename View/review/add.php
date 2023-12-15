<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a term</title>
    <?php
    include 'View/includes/style.php';
    ?>
</head>
<body>
    <?php
    include 'View/includes/header.php';
    if(!is_array($data)){
        echo "<div class='alert alert-warning' role='alert'>$data</div>";
    }
    ?>
    <form method="post">
        <div class="input">
            <label for="">Stars</label>
            <input type="number" name="num" min="1" max="5" value="1">
        </div>
        <div class="input">
            <label for="">Term</label>
            <input type="text" name="TRM" placeholder="Enter a term...">
        </div>
        <div class="input">
            <input type="submit" name="add" value="Add">
        </div>
    </form>
</body>
</html>
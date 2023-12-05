<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding page</title>
    <?php
    include 'View/includes/style.php';
    ?>
</head>
<body>
    <form method="post">
        <input type="text" name="feat" placeholder="Feature">
        <textarea name="desc" placeholder="Enter description here..."></textarea>
        <input type="submit" name="add" value="Add">
    </form>
</body>
</html>
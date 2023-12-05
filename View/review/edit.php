<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a term</title>
    <?php
    include 'View/includes/style.php';
    ?>
</head>
<body>
    <?php
    include 'View/includes/header.php';
    ?>
    <div class="container mt-4">
        <form method="post">
            <div class="form-group">
                <h2>Actual rating: <?=$data->stars?>  <i class="fa fa-star text-warning"></i></h2>
                <label for="stars">Stars:</label>
                <input type="number" name="stars" value="<?=$data->stars?>" min="1" max="5">
            </div>
            <div class="form-group">
                <label for="term">Term:</label>
                <input type="text" class="form-control" name="term" value="<?=$data->term?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="edit" value="Update">
            </div>
        </form>
        <form method="post">
            <input type="hidden" name="id" value="<?=$data->id?>">
            <input type="submit" class="btn btn-primary" name="delete" onclick="return confirm('Confirm your action of deleting <?=$data->stars.' '.$data->term?>');" value="Remove">
        </form>
    </div>

</body>
</html>

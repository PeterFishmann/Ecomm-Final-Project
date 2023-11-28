<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add features</title>
</head>
<body>
    <?php
    include 'View/includes/style.php';
    include 'View/includes/header.php';
    ?>
    <h1>It's time to add some features to your car</h1>
    <table class="table">
        <th>Feature</th>
        <th>Description</th>
        <th>Yes/No</th>
        <?php
        foreach($data['features'] as $feature){
        ?>
        <tr>
            <td><?=$feature->features?></td>
            <td><?=$feature->description?></td>
            <form method="post"><td><input type="checkbox" name="<?=$feature->id?>" value="<?=$feature->features?>" multiple></td>
        </tr>
        <?php
        }
        ?>
        <input type="submit" name="confirm">
        </form>
    </table>
</body>
</html>
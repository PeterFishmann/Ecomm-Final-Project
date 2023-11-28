<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View order</title>
    <?php
    include 'View/includes/style.php';
    ?>
</head>
<body>
    <?php
    include 'View/includes/header.php';
    ?>
    <h1><center>Car details before purchasing</center></h1>
    <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="../../Images/cars/<?= $data->picture ?>" width="250px" height="250px" class="img-fluid rounded product-image">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data->make ?> <?= $data->model ?></h5>
                            <div class="spec-1">
                                <p>This car is <?=$data->status?> and has traveled <?=$data->distance?> Km. It costs <?=$data->price?>$ because of its unique and great <a href="/order/detail/<?=$data->id?>">features</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body text-center">
                            <h4 class="card-title"><?= $data->price ?>$</h4>
                            <form action="" method="post">
                            <input type="submit" class="btn btn-primary btn-sm" name="Add" value="Add to cart">
                            <a href="/car/index" class="btn btn-danger btn-sm">Cancel action</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>
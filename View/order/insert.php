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
                        <img src="../../Images/cars/<?= $data['car']->picture ?>" width="250px" height="250px" class="img-fluid rounded product-image">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['car']->make ?> <?= $data['car']->model ?></h5>
                            <div class="d-flex flex-row">   
                                <div class="ratings mr-2">
                                    <?php
                                    $i = 0;
                                    $a = 5 - intval($data['rating']->avg);
                                    while(intval($data['rating']->avg)>$i){
                                        echo '<i class="fa fa-star text-warning"></i>';
                                        $i++;
                                    }
                                    $i = 0;
                                    while($i<$a){
                                        echo '<i class="fa fa-star"></i>';
                                        $i++;
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="spec-1">
                                <p>This car is <?=$data['car']->status?> and has traveled <?=$data['car']->distance?> Km. It costs <?=$data['car']->price?>$ because of its unique and great <a href="/order/detail/<?=$data['car']->id?>">features</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body text-center">
                            <h4 class="card-title"><?= $data['car']->price ?>$</h4>
                            <form action="" method="post">
                            <a href="/comment/insert/<?=$data['car']->id?>" class="btn btn-warning btn-sm">Leave a comment</a>
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
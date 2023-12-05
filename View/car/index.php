<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Catalog</title>
    <?php
    include 'View/includes/style.php';
    ?>
</head>
<body>
    <?php
    include 'View/includes/header.php';
    include 'View/includes/sidebar.php';
    ?>
    <div class="container mt-5">
        <h1 class="text-center">Car Catalog</h1>
        <div class="card-body text-center">
            <?php
                if (isset($_SESSION['username']) && $_SESSION['right'] != "Buyer") {
            ?>
        <a href="/car/create" class="btn btn-primary">Add a car</a>
       <?php
                }
       ?>
        </div>
        <?php
        if(!is_array($data)){
            echo "<div class='alert alert-warning' role='alert'>$data</div>";
        }else{
        foreach ($data['cars'] as $item) {
        ?>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="../../Images/cars/<?= $item->picture ?>" class="img-fluid rounded product-image">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item->make ?> <?= $item->model ?></h5>
                            <div class="d-flex flex-row">   
                                <div class="ratings mr-2">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="spec-1">
                                <span><b>Interior:</b> <?= $item->int_col ?></span>
                                <span class="dot"></span>
                                <span><b>Exterior:</b> <?= $item->ext_col ?></span>
                                <span class="dot"></span>
                                <span><b>Year:</b> <?= $item->year ?></span>
                            </div>
                            <div class="spec-1">
                                <span><b>Distance:</b> <?= $item->distance ?> km</span>
                                <span class="dot"></span>
                                <span><b>Status:</b> <?= $item->status ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body text-center">
                            <h4 class="card-title"><?= $item->price ?>$</h4>
                            <?php
                            if(isset($_SESSION['username']) && $_SESSION['right'] != "Seller" && $_SESSION['id'] != $item->user_id){
                            ?>
                            <a href="/order/insert/<?=$item->id?>" class="btn btn-primary btn-sm">Buy</a>
                            <?php
                            }else if(!isset($_SESSION['username'])){
                                ?>
                                <a href="/user/login" class="btn btn-primary btn-sm">Buy</a>
                                <?php
                            }
                            if (isset($_SESSION['username']) && ($_SESSION['right'] == "Admin" || $_SESSION['id'] == $item->user_id)) {
                            ?>
                                <a href="/car/edit/<?= $item->id ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="/car/delete/<?= $item->id ?>" onclick="return confirm('Confirm your action of deleting <?= $item->make.' '.$item->model ?>?');" class="btn btn-danger btn-sm">Delete</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
        ?>
    </div>
</body>
</html>

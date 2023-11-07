<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of items</title>
</head>
<body>
    <?php
    include 'View/includes/style.php';
    include 'View/includes/navbar.php';
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
                }else{
                    ?>
                    <a href="/user/login" class="btn btn-primary">Add a car</a>
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
                        <img src="../../Images/cars/<?= $item->picture ?>" alt="<?= $item->make ?>" class="img-fluid rounded product-image">
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
                            <h6 class="text-success"><?= ($item->price <= 10000) ? 'Great deal' : 'Could negotiate with you' ?></h6>
                            <?php
                            if(isset($_SESSION['username'])){
                            ?>
                            <a href="/car/buy/<?= $item->id ?>" class="btn btn-primary btn-sm btn-block mb-3">Buy</a>
                            <?php
                            }else{
                                ?>
                                <a href="/user/login" class="btn btn-primary btn-sm btn-block mb-3">Buy</a>
                                
                                <?php
                            }
                            if (isset($_SESSION['username']) && $_SESSION['right'] == "Admin") {
                            ?>
                                <a href="/car/edit/<?= $item->id ?>" class="btn btn-primary btn-sm btn-block">Edit</a>
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

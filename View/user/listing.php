<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['username']?> cars listing</title>
</head>
<body>
    <?php
    include 'View/includes/style.php';
    include 'View/includes/header.php';

    
    ?>
    <div class="container mt-5">
        <h1 class="text-center">My Products</h1>
        <div class="card-body text-center">
        </div>
        
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="../../Images/cars/mclaren.png" class="img-fluid rounded product-image">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title">Honda Civic</h5>
                            <div class="spec-1">
                                <span><b>Interior:</b>a</span>
                                <span class="dot"></span>
                                <span><b>Exterior:</b> a</span>
                                <span class="dot"></span>
                                <span><b>Year:</b> a</span>
                            </div>
                            <div class="spec-1">
                                <span><b>Distance:</b> 100 km</span>
                                <span class="dot"></span>
                                <span><b>Status:</b> New</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body text-center">
                            <h4 class="card-title">4444$</h4>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>

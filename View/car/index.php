<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of items</title>
    </head>
    <?php
    include 'View/includes/style.php';
    include 'View/includes/navbar.php';
    ?>
<body>
    <form action="" method="post">
        <input name="search" type="text" placeholder="Enter make/model">
        <input type="submit" value="Search" name="sch">
    </form>
    <h1><center>Car Catalog</center></h1>
<?php
            foreach($data['cars'] as $item){
                ?>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="row p-2 bg-white border rounded">
                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="../../Images/<?php echo $item->picture?>"></div>
                    <div class="col-md-6 mt-1">
                        <h5><?php  echo $item->make." ".$item->model?></h5>
                        <div class="d-flex flex-row">
                            <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span></span>
                        </div>
                        <div class="mt-1 mb-1 spec-1"><span><b>Interior: </b><?= $item->int_col?></span><span class="dot"></span><span><b> Exterior: </b><?= $item->ext_col?></span><span class="dot"></span><span><b> Year: </b><?= $item->year?><br></span></div>
                        <div class="mt-1 mb-1 spec-1"><span><b>Distance: </b><?= $item->distance?> km</span><span class="dot"></span><span><b> Status: </b><?= $item->status?></span></div>
                        <!--<p class="text-justify text-truncate para mb-0">Good car<br><br></p>!-->
                    </div>
                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                        <div class="d-flex flex-row align-items-center">
                            <h4 class="mr-1"><?php echo $item->price?>$</h4>
                        </div>
                        <h6 class="text-success"><?php if($item->price<=10000){echo "Great deal";}else{echo "Could negotiate with you";}?></h6>
                        <div class="d-flex flex-column mt-4"><a href="/car/buy/<?php echo $item->id ?>" class="btn btn-primary btn-sm" type="button">Buy</a></div>
                        <?php
                        if(isset($_SESSION['username'])){
                        ?>
                        <div class="d-flex flex-column mt-4"><a href="/car/edit/<?php echo $item->id ?>" class="btn btn-primary btn-sm" type="button">Edit</a></div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
        <?php
            /*foreach($data['Car'] as $item){
                ?>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="row p-2 bg-white border rounded">
                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="../../Images/<?php echo $item->picture?>"></div>
                    <div class="col-md-6 mt-1">
                        <h5><?php  echo $item->make." ".$item->model?></h5>
                        <div class="d-flex flex-row">
                            <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span></span>
                        </div>
                        <div class="mt-1 mb-1 spec-1"><span><b>Interior: </b><?= $item->int_col?></span><span class="dot"></span><span><b>Exterior: </b><?= $item->ext_col?></span><span class="dot"></span><span><b>Year: </b><?= $item->year?><br></span></div>
                        <div class="mt-1 mb-1 spec-1"><span><b>Distance: </b><?= $item->distance?> km</span><span class="dot"></span><span><b>Status: </b><?= $item->status?></span></div>
                        <!--<p class="text-justify text-truncate para mb-0">Good car<br><br></p>!-->
                    </div>
                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                        <div class="d-flex flex-row align-items-center">
                            <h4 class="mr-1"><?php echo $item->price?>$</h4>
                        </div>
                        <h6 class="text-success"><?php if($item->price<=10000){echo "Great deal";}else{echo "Could negotiate with you";}?></h6>
                        <div class="d-flex flex-column mt-4"><a href="/car/buy/<?php echo $item->id ?>" class="btn btn-primary btn-sm" type="button">Buy</a></div>
                        <?php
                        if(isset($_SESSION['username'])){
                        ?>
                        <div class="d-flex flex-column mt-4"><a href="/car/edit/<?php echo $item->id ?>" class="btn btn-primary btn-sm" type="button">Edit</a></div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
                
                </div>
            </div>
        </div><?php
        }*/
    }
        ?>
</body>
</html>
<!--<style>
    body{
        background:#eee
    }
    .ratings i{
        font-size: 16px;color: red
    }
    .strike-text{
        color: red;text-decoration: line-through
    }
    .product-image{
        width: 100%
    }
    .dot{
        height: 7px;
        width: 7px;
        margin-left: 6px;
        margin-right: 6px;
        margin-top: 3px;
        background-color: blue;
        border-radius: 50%;
        display: inline-block
    }.spec-1{
        color: #938787;
        font-size: 15px
    }
    h5{
        font-weight: 400
    }
    .para{
        font-size: 16px
        }
</style>
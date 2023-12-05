<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <?php
    include 'View/includes/style.php';
    ?>
</head>
<body>
<?php
include 'View/includes/header.php';
?>
<div class="text">
<p>Welcome to EZCARBUYER, your destination for buying a car of your dreams. We are dedicated to provide you with cars of your choice to enhance your experience. Whether you are young, old or simply interested in buying a car. We are of telling you that you have come to the right place at the right moment.</p>
</div>
<div class="lol">
</div>
</body>
</html>
<style>
    body{
        background-color:lightgrey;
    }
    .text{
        width:50%;
        margin:auto;
    }
    .text p{
        font-size:30px;
        font-family: serial;
        font-weight:bold;
    }
    .lol{
        width:75%;
        height:500px;
        border-radius:10px;
        margin:auto;
        text-align:center;
        animation: mymove 60s infinite;
    }
    
    @keyframes mymove {
        0%{
            background-image: url('../../Images/cars/image1.png');
            background-size: cover; /* This ensures the image covers the entire background */
            background-position: center; /* Center the image */
            background-repeat: no-repeat;
        }
        20%{
            background-image: url('../../Images/cars/image2.png');
            background-size: cover; /* This ensures the image covers the entire background */
            background-position: center; /* Center the image */
            background-repeat: no-repeat;
        }
        40%{
            background-image: url('../../Images/cars/image3.png');
            background-size: cover; /* This ensures the image covers the entire background */
            background-position: center; /* Center the image */
            background-repeat: no-repeat;
        }
        60%{
            background-image: url('../../Images/cars/image4.png');
            background-size: cover; /* This ensures the image covers the entire background */
            background-position: center; /* Center the image */
            background-repeat: no-repeat;
        }
        80%{
            background-image: url('../../Images/cars/image5.png');
            background-size: cover; /* This ensures the image covers the entire background */
            background-position: center; /* Center the image */
            background-repeat: no-repeat;
        }
        100%{
            background-image: url('../../Images/cars/image6.png');
            background-size: cover; /* This ensures the image covers the entire background */
            background-position: center; /* Center the image */
            background-repeat: no-repeat;
        }
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of items</title>
    </head>
    <?php
    include 'View/includes/style.php';
    include 'View/includes/header.php';
    ?>
<body>
   <h1><center>Order List</center></h1>
   <table>
    <th>User</th>
    <th>Car</th>
    <th>status</th>
    <th>Price</th>

        <?php
            foreach($data['order'] as $order){
                echo "<tr><td>$order->user_id</td><td>$order->car_id</td><td>$order->status</td><td>$order->price</td><td><a href='/order/update/$order->id'>Edit</a></td></tr>";
            }
        ?>
        </table>
    </body>
</html>
<style>
   table, th, td, tr{
    border:solid black 0.1rem;
    text-align:center;
    margin: auto;
   }
</style>
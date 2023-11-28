<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car details</title>
    <?php
    include 'View/includes/style.php';
    include 'View/includes/header.php';
    ?>
</head>
<body>
<div class="Table">
   <table>
    <th>Make</th>
    <th>Model</th>
    <th>Year</th>
    <th>Distance</th>
    <th>Price</th>
    <th>Exterior</th>
    <th>Interior</th>
    <th>Status</th>
    <th>Picture</th>
    <tr>
        <td><?= $data->make?></td>
        <td><?= $data->model?></td>
        <td><?= $data->year?></td>
        <td><?= $data->distance?> KM</td>
        <td><?= $data->price?>$</td>
        <td><?= $data->ext_col?></td>
        <td><?= $data->int_col?></td>
        <td><?= $data->status?></td>
        <td><img src="../../Images/cars/<?= $data->picture?>" width="80px" height="80px"?></td>
    </tr>
   </table>
</div>
</body>
</html>
<style>
    .Table{
        width:fit-content;
        height:fit-content;
        margin:auto;
        margin-top:10px;
    }
    table tr, td{
        color:black;
        border:1px solid black;
    }
    th{
        color:white;
        background-color:black;
        text-align:center;
        border:1px solid white;
    }
</style>
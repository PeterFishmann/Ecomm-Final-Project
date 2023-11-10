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
        <td><?= $data->picture?></td>
    </tr>
   </table> 
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My client's Comments</title>
    <?php
    include 'View/includes/style.php';
    ?>
</head>
<body>
    <?php
    include 'View/includes/header.php';
    ?>
    <table>
        <th>Sender</th>
        <th>comment</th>
        <th>date</th>
        <th>car</th>
        <th><center>Action</center></th>
        <tr>
            <?php
            foreach($data['com'] as $item){?>
            <td><?=$item->username?></td>
            <td><?=$item->comment?></td>
            <td><?=$item->date?></td>
            <td><?=$item->make." ".$item->model." (".$item->car_id.")"?></td>
            <td><center><a href="/comment/reply/<?=$item->id?>" class="btn btn-primary btn-sm">Reply</a></center></td>
        </tr>

            <?php
            }            
            ?>
    </table>
</body>
</html>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: lightgrey;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            margin:auto;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            background-color: #f2f2f2;
        }

        td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
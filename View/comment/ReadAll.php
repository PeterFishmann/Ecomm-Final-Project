<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Comments</title>
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
   <th>Comment</th>
   <th>Date</th>
   <th>Car</th>
   <th>Receiver</th>
   <tr>
   <?php
   foreach($data['comment'] as $com){
    ?>
    <td><?=$com->username?></td>
    <td><?=$com->comment?></td>
    <td><?=$com->date?></td>
    <td><?=$com->make." ".$com->model?></td>
    <td><?=$com->receiver?></td> 
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
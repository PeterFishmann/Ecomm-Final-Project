<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read reviews</title>
    <?php
    include "View/includes/style.php";
    ?>
</head>
<body>
<?php
    include "View/includes/header.php";
    ?>
    <table>
        <th>username</th>
        <th>make & model</th>
        <th>stars</th>
        <th>term</th>
        <th>Comment</th>
        <?php 
        foreach($data as $rev):
        ?>
        <tr>
        <td><?=$rev->username?></td>
        <td><?=$rev->make." ".$rev->model?></td>
        <td><?=$rev->stars?></td>
        <td><?=$rev->term?></td>
        <td><?=$rev->comment?></td>
        <tr>
        <?php
        endforeach;
        ?>
    </table>
</body>
</html>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
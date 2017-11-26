<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php
           if (isset($titulo)) { echo $titulo;} 
            else {echo "CodeIgniter"; }
        ?>
    </title>
    <link rel="stylesheet" href="https://bootswatch.com/3/cyborg/bootstrap.min.css">
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
</head>
<body>

<?php require_once 'navbar.php';

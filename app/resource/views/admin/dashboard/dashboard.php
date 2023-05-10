<?php //require('app/resource/views/templates/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/resource/css/header.css">
    <link rel="stylesheet" href="/app/resource/css/register.css">
    <link rel="stylesheet" href="/app/resource/css/main.css">
    <link rel="stylesheet" href="/app/resource/css/footer.css">
    <link rel="stylesheet" href="/app/resource/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Dashboard</h3>
            <button class="sidebar-toggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <nav class="sidebar-menu">
            <ul>
                <li><a href="#">Category</a></li>
                <li><a href="#">Customer</a></li>
                <li><a href="#">Price</a></li>
                <li><a href="<?= $this->getBaseURL('product')?>">Product</a></li>
                <li><a href="<?= $this->getBaseURL('status')?>">Status</a></li>
                <li><a href="#">SubCategory</a></li>
                <li><a href="#">User</a></li>
            </ul>
        </nav>
    </div>



<?php //require('app/resource/views/templates/footer.php'); ?>

<script src='/app/resource/js/nav.js'></script>
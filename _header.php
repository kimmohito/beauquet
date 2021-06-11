<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
            $page = basename($_SERVER['SCRIPT_FILENAME'], '.php');
            if($page=='index'){$page='home';}
            echo $page.' | BeauQuet';
        ?>
    </title>
    <link rel="icon" href="assets/img/logo/logo.png">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="banner">
        <div class="container">
            <img class="banner-logo" src="assets/img/logo/banner-logo.png">
        </div>
    </div>

    <nav>
        <?php
            if(!isset($_SESSION['uId'])){
                echo '<a href="index.php">About</a>';
                echo '<a href="product.php">Products</a>';
                echo '<a href="contact.php">Contact</a>';
                echo '<a href="login.php">Login</a>';
            }else{
                echo '<a href="index.php">About</a>';
                echo '<a href="product.php">Products</a>';
                if($_SESSION['uType']!='admin'){
                    echo '<a href="contact.php">Contact</a>';
                    echo '<a href="cart.php">Cart</a>';
                }else{                
                    echo '<a href="payment.php">Payment</a>';
                    echo '<a href="inbox.php">Inbox</a>';
                }
                echo '<a href="profile.php">'.ucwords($_SESSION['uName']).'</a>';
            }
        ?>        
    </nav>



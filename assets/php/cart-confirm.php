<?php

// Include databse first
include 'connect.php';

// Start session
session_start();

$user_id=$_SESSION['uId'];

$cart_id=rand();

$query = "UPDATE carts SET cGroup='$cart_id', cStatus='pending' WHERE cUserId='$user_id' AND cGroup='0' AND cStatus='in-cart'";

$result = mysqli_query($connect,$query);

header('location: ../../cart.php');
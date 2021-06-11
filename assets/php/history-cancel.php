<?php

// Include databse first
include 'connect.php';

// Start session
session_start();

$cart_id=$_GET['cart_id'];

$query = "DELETE FROM carts WHERE cGroup='$cart_id'";

$result = mysqli_query($connect,$query) or die('error');

header('location: ../../cart.php');
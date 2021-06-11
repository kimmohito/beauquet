<?php

// Include databse first
include 'connect.php';

// Start session
session_start();

// Set timezone
date_default_timezone_set("Asia/Kuala_Lumpur");

$cart_id=$_GET['cart_id'];

$query = "UPDATE carts SET cStatus='pending' WHERE cGroup='$cart_id' AND cStatus='completed'";

$result = mysqli_query($connect,$query);

header('location: ../../payment.php');
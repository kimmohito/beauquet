<?php

// Include databse first
include 'connect.php';

// Start session
session_start();

// Set timezone
date_default_timezone_set("Asia/Kuala_Lumpur");

$cart_id=$_GET['cart_id'];

$item_date = date('Y-m-d H:i:s');


$query = "UPDATE carts SET cDate='$item_date', cStatus='completed' WHERE cGroup='$cart_id' AND cStatus='pending'";

$result = mysqli_query($connect,$query);

header('location: ../../payment.php');
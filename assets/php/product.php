<?php

// Include databse first
include 'connect.php';

// Start session
session_start();

// Define
$uId = $_SESSION['uId'];
$pId = $_GET['pId'];
$pQuantity=1;
$pStatus='in-cart';

// Get name, price from product id
$query = "SELECT * FROM products WHERE pId='$pId'";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_assoc($result);
$pName=$row['pName'];
$pDescription=$row['pDescription'];
$pPrice=$row['pPrice'];

// Insert databse
$query = "INSERT INTO carts (
    cUserId,
    cProductName,
    cProductDescription,
    cProductPrice,
    cProductQuantity,
    cItemTotal,
    cStatus
    ) VALUES (
    '$uId',
    '$pName',
    '$pDescription',
    '$pPrice',
    '$pQuantity',
    '$pPrice',
    '$pStatus'
    )";
$result=mysqli_query($connect,$query) or die('error');
header('location: ../../cart.php');
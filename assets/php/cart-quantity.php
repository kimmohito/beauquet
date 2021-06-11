<?php

// Include databse first
include 'connect.php';

// Start session
session_start();

$item_id=$_GET['item_id'];

$query = "SELECT * FROM carts WHERE cId='$item_id'";
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_assoc($result);

$item_price = $row['cProductPrice'];

if($_GET['item_quantity']=='add'){
    $item_quantity = $row['cProductQuantity']+1;
}else{
    $item_quantity = $row['cProductQuantity']-1;
}
$item_total= $item_price*$item_quantity;

$query = "UPDATE carts SET cProductQuantity='$item_quantity', cItemTotal='$item_total' WHERE cId='$item_id'";
$result = mysqli_query($connect,$query);

header('location: ../../cart.php');
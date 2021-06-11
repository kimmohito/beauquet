<?php

// Include databse first
include 'connect.php';

// Start session
session_start();

$item_id=$_GET['item_id'];

$query = "DELETE FROM carts WHERE cId='$item_id'";

$result = mysqli_query($connect,$query);

header('location: ../../cart.php');
<?php

// Include databse first
include 'connect.php';

// Start session
session_start();

$uId=$_SESSION['uId'];

$query = "DELETE FROM carts WHERE cUserId='$uId' AND cStatus='in-cart'";

$result = mysqli_query($connect,$query);

header('location: ../../cart.php');
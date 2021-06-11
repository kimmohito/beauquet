<?php

// Include databse first
include 'connect.php';

$product_id=$_GET['pId'];

$query = "DELETE FROM products WHERE pId='$product_id'";

$result = mysqli_query($connect,$query);

header('location: ../../product.php');
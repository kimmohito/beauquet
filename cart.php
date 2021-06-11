<?php include '_header.php';?>

<main>
    <div class="container">


        <!-- Cart -->
        <div class="card-white">
            <h2>Cart</h2><br>

            <table class="table-message table-cart">
                <tr>
                    <th>Count</th>
                    <th>Item Name</th>
                    <th>Item Description</th>
                    <th>Item Quantity</th>
                    <th>Item Price</th>
                </tr>

                <?php
                    
                    include 'assets/php/connect.php';

                    $uId=$_SESSION['uId'];

                    $query = "SELECT * FROM carts WHERE cUserId='$uId' AND cStatus='in-cart'";
                    $result = mysqli_query($connect,$query);
                    $count=1;
                    $total=0;
                    while($row=mysqli_fetch_assoc($result)){
                        echo '<tr>';
                            echo '<td>'.$count++.'.</td>';
                            echo '<td>'.$row['cProductName'].'</td>';
                            echo '<td>'.$row['cProductDescription'].'</td>';
                            echo '<td>';
                                if($row['cProductQuantity']>1){ echo '<a href="assets/php/cart-quantity.php?item_id='.$row['cId'].'&item_quantity=minus">-</a>';}
                                else{ echo '<a href="assets/php/cart-remove.php?item_id='.$row['cId'].'">-</a>';}
                                echo $row['cProductQuantity'].'<a href="assets/php/cart-quantity.php?item_id='.$row['cId'].'&item_quantity=add">+</a></td>';
                            echo '<td style="text-align: right;">RM '.number_format($row['cItemTotal'],2, ".", ",").'</td>';
                        echo '</tr>';
                        $total=$total+$row['cItemTotal'];
                    }
                    echo '<tr><td colspan="4"></td><td style="font-size: 20px; text-align: right;"><b>RM '.number_format($total,2, ".", ",").'</b></td></tr>';
                
                
                ?>


            </table>

            <div class="cart-confirm">
                <a href="assets/php/cart-clear.php">Clear</a><a href="assets/php/cart-confirm.php">Confirm</a>
            </div>
        </div>


        <!-- History -->
        <div class="card-white">
            <h2>Pending</h2>
            <table class="table-message table-cart">
                <tr>
                    <th>Count</th>
                    <th>Receipt Id</th>
                    <th>Item Info</th>
                    <th>Total Price</th>
                    <th>Option</th>
                </tr>

                <?php
                    $user_id = $_SESSION['uId'];
                    $query = "SELECT * FROM carts WHERE cUserId='$user_id' AND cStatus='pending' GROUP BY cGroup ORDER BY cDate DESC";
                    $result = mysqli_query($connect,$query);
                    $count=1;
                    $final_total=0;
                    while($row=mysqli_fetch_assoc($result)){
                        echo '<tr>';
                            // Count
                            echo '<td>'.$count++.'.</td>';
                            // Cart ID
                            echo '<td>'.$row['cGroup'].'</td>';
                            // Cart Item list
                            echo '<td style="text-align: left;">';
                                $cart_id=$row['cGroup'];                        
                                $query3 = "SELECT * FROM carts WHERE cGroup='$cart_id'";
                                $result3 = mysqli_query($connect,$query3);
                                $count3=1;
                                $total=0;
                                while($row3=mysqli_fetch_assoc($result3)){
                                    echo '<p>';
                                        echo $count3++.'.';
                                        echo $row3['cProductName'];
                                        echo '(*';
                                        echo $row3['cProductQuantity'];
                                        echo ') RM';
                                        echo number_format($row3['cProductPrice'],2, ".", ",");
                                        echo '';
                                    echo '</p>';
                                    $total=$total+$row3['cItemTotal'];
                                }
                            echo '</td>';

                            echo '<td style="text-align: right;"><b>RM '.number_format($total,2, ".", ",").'</b></td>';

                            echo '<td><a href="assets/php/history-cancel.php?cart_id='.$cart_id.'">Cancel</a></td>';

                        echo '</tr>';
                        $final_total=$final_total+$total;
                    }
                    echo '<tr><td colspan="3"></td><td style="font-size: 20px; text-align: right;"><b>RM '.number_format($final_total,2, ".", ",").'</b></td><td></td></tr>';
            
                ?>


            </table>
        </div>


        <!-- Pending -->
        <div class="card-white">
            <h2>Completed</h2><br>
            <table class="table-message table-cart">
            <tr>
                <th>Count</th>
                <th>Receipt Id</th>
                <th>Receipt Date</th>
                <th>Item Info</th>
                <th>Total Price</th>
            </tr>

            <?php
                $user_id = $_SESSION['uId'];
                $query = "SELECT * FROM carts WHERE cUserId='$user_id' AND cStatus='completed' GROUP BY cGroup ORDER BY cDate DESC";
                $result = mysqli_query($connect,$query);
                $count=1;
                $final_total=0;
                while($row=mysqli_fetch_assoc($result)){
                    echo '<tr>';
                        // Count
                        echo '<td>'.$count++.'.</td>';
                        // Cart ID
                        echo '<td>'.$row['cGroup'].'</td>';
                        // Receipt Date
                        echo '<td>'.$row['cDate'].'</td>';
                        // Cart Item list
                        echo '<td  style="text-align: left;">';
                            $cart_id=$row['cGroup'];                        
                            $query3 = "SELECT * FROM carts WHERE cGroup='$cart_id'";
                            $result3 = mysqli_query($connect,$query3);
                            $count3=1;
                            $total=0;
                            while($row3=mysqli_fetch_assoc($result3)){
                                echo '<p>';
                                    echo $count3++.'.';
                                    echo $row3['cProductName'];
                                    echo '(*';
                                    echo $row3['cProductQuantity'];
                                    echo ') RM';
                                    echo number_format($row3['cProductPrice'],2, ".", ",");
                                    echo '';
                                echo '</p>';
                                $total=$total+$row3['cItemTotal'];
                            }
                            echo '</td>';

                            echo '<td style="text-align: right;"><b>RM '.number_format($total,2, ".", ",").'</b></td>';


                    echo '</tr>';
                    $final_total=$final_total+$total;
                }

                echo '<tr><td colspan="4"></td><td style="font-size: 20px; text-align: right;"><b>RM '.number_format($final_total,2, ".", ",").'</b></td></tr>';
        
            ?>


        </table>

        </div>
        






    </div>
</main>


<?php include '_footer.php';?>
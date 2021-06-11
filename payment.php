<?php include '_header.php';?>

<main>
    <div class="container">

        <!-- Pending-->
        <div class="card-white">
            <h2>Pending</h2>

            <table class="table-message table-cart">
            <tr>
                <th>Count</th>
                <th>Receipt Id</th>
                <th>User Info</th>
                <th>Item Info</th>
                <th>Total Price</th>
                <th>Option</th>
            </tr>

            <?php
                include 'assets/php/connect.php';
                $query = "SELECT * FROM carts WHERE cStatus='pending' GROUP BY cGroup ORDER BY cId DESC";
                $result = mysqli_query($connect,$query);
                $count=1;
                while($row=mysqli_fetch_assoc($result)){
                    echo '<tr>';
                        // Count
                        echo '<td>'.$count++.'.</td>';
                        // Cart ID
                        echo '<td>'.$row['cGroup'].'</td>';
                        // Cart User Info
                        echo '<td>';
                            $user_id=$row['cUserId'];
                            $query2 = "SELECT * FROM users WHERE uId='$user_id'";
                            $result2 = mysqli_query($connect,$query2);
                            $row2 = mysqli_fetch_assoc($result2);
                            echo $row2['uName'].'<br>';
                            echo $row2['uEmail'].'<br>';
                        echo '</td>';
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

                        echo '<td><a href="assets/php/payment-pay.php?cart_id='.$cart_id.'">Pay</a></td>';

                    echo '</tr>';
                }
            ?>


            </table>

        </div>

        <!-- Completed -->
        <div class="card-white">
            <h2>Completed</h2>


            <table class="table-message table-cart">
            <tr>
                <th>Count</th>
                <th>Receipt Id</th>
                <th>Receipt Date</th>
                <th>User Info</th>
                <th>Item Info</th>
                <th>Total Price</th>
                <th>Option</th>
            </tr>

            <?php
                $query = "SELECT * FROM carts WHERE cStatus='completed' GROUP BY cGroup ORDER BY cDate DESC";
                $result = mysqli_query($connect,$query);
                $count=1;
                while($row=mysqli_fetch_assoc($result)){
                    echo '<tr>';
                    // Count
                    echo '<td>'.$count++.'.</td>';
                    // Cart ID
                    echo '<td>'.$row['cGroup'].'</td>';
                    // Receipt Date
                    echo '<td>'.$row['cDate'].'</td>';
                        // Cart User Info
                        echo '<td>';
                            $user_id=$row['cUserId'];
                            $query2 = "SELECT * FROM users WHERE uId='$user_id'";
                            $result2 = mysqli_query($connect,$query2);
                            $row2 = mysqli_fetch_assoc($result2);
                            echo $row2['uName'].'<br>';
                            echo $row2['uEmail'].'<br>';
                        echo '</td>';
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

                        echo '<td><a href="assets/php/payment-refund.php?cart_id='.$cart_id.'">Refund</a></td>';

                    echo '</tr>';
                }
            ?>


            </table>
        </div>
        

    </div>
</main>


<?php include '_footer.php';?>
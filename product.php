<?php include '_header.php';?>

<main>
    <div class="container">

        <?php
        
            include 'assets/php/connect.php';
            if(isset($_GET['pId'])){
                echo '<div class="card-white product-selected">';

                    $id = $_GET['pId'];
                    $query = "SELECT * FROM products WHERE pId='$id'";
                    $result = mysqli_query($connect,$query);
                    $row=mysqli_fetch_assoc($result);
                    echo '<h2>'.$row['pName'].'</h2>';
                    echo '<h3><span>RM'.$row['pPrice'].'</span></h3><br>';
                    echo '<img src="assets/img/product/'.$row['pImg'].'">';
                    echo '<p>'.$row['pDescription'].'</p>';

                    if(!isset($_SESSION['uId'])){
                        echo '<a href="login.php">Add to cart</a>';
                    }else{
                        if($_SESSION['uType']=='admin'||$_SESSION['uType']=='seller'){
                            echo '<a href="assets/php/product-delete.php?pId='.$id.'" style="background: #ac0809;">Delete Item</a>';
                        }else{
                            echo '<a href="assets/php/product.php?pId='.$id.'">Add to cart</a>';
                        }
                    }

                echo '</div>';
            }
        ?>
        

        <!-- FAQs -->
        <div class="card-white">
            <h2>Product</h2>

            <?php
            // Product grid
            echo '<div class="product-container">';

                // Calling each products in a grid
                $query = "SELECT * FROM products ORDER BY pName ASC";
                $result = mysqli_query($connect,$query);
                while($row=mysqli_fetch_assoc($result)){
                    echo '<a class="product-grid" href="?pId='.$row['pId'].'">';
                        echo '<img src="assets/img/product/'.$row['pImg'].'">';
                        echo '<div class="name"><b>'.$row['pName'].'</b></div>';
                        echo '<div class="price">RM '.$row['pPrice'].'</div>';
                    echo '</a>';
                }

                if(isset($_SESSION['uType'])){
                    if($_SESSION['uType']=='admin'||$_SESSION['uType']=='seller'){
                        echo '<a class="product-grid" href="product-new.php"><br><br><br>New</a>';
                    }
                }

            echo '</div>';
            ?>
        </div>

    </div>
</main>


<?php include '_footer.php';?>
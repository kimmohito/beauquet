<?php
include '_header.php';

if(isset($_POST['login'])){
    include 'assets/php/connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash=md5($password);
    $query = "SELECT * FROM users WHERE (uName='$username' OR uEmail='$username') AND uHash='$hash'";
    $result = mysqli_query($connect,$query);
    $count = mysqli_num_rows($result);
    if($count==0){
        $_POST['error-message']='User not existed or password not matched.';
    }else{
        $row=mysqli_fetch_assoc($result);
        $_SESSION['uId']=$row['uId'];  
        $_SESSION['uType']=$row['uType'];  
        $_SESSION['uName']=$row['uName'];  
        $_SESSION['uEmail']=$row['uEmail'];  
        header('location: index.php');
    }
}
?>

<main>
    <div class="container">

        <!-- Login -->
        <div class="card-white">
            <form class="form-main" method="post">
                <h2>Login</h2><br>

                <?php
                    if(isset($_POST['error-message'])){
                        echo '<p class="error-message">'.$_POST['error-message'].'</p><br>';
                        $_POST['error-message']='';
                    }
                ?>

                <input type="text" name="username" placeholder="Email or Username" required/><br>
                
                <input type="password" name="password" placeholder="Password" required/><br>
                
                <button class="login-button" type="submit" name="login">Login</button><br><br>

                <p>Doesn't have an account? <a href="register.php">Register</a></p>
            </form>
        </div>
        
    </div>
</main>





<?php include '_footer.php';?>
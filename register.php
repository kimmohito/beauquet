<?php
include '_header.php';

if(isset($_POST['register'])){
    include 'assets/php/connect.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $query="SELECT * FROM users WHERE uName='$username' OR uEmail='$email'";
    $result = mysqli_query($connect,$query);
    $count = mysqli_num_rows($result);
    if($count!=0){
        $_POST['error-message']='Username or email already being used.';
    }
    if($password!=$cpassword){
        $_POST['error-message']='Password not match.';
    }
    else{
        $hash=md5($password);
        $query="INSERT INTO users (uType, uName, uEmail, uHash) VALUES ('buyer', '$username', '$email', '$hash')";
        $result = mysqli_query($connect,$query);
        $_POST['error-message']='User '.$username.' registered';
    }
}
?>

<main>
    <div class="container">

        <!-- Register -->
        <div class="card-white">
            <form class="form-main" method="post">
                <h2>Register</h2><br>

                <?php
                    if(isset($_POST['error-message'])){
                        echo '<p class="error-message">'.$_POST['error-message'].'</p><br>';
                        $_POST['error-message']='';
                    }
                ?>

                <input type="text" name="username" placeholder="Username" required/><br>
                
                <input type="email" name="email" placeholder="Email" required/><br>

                <input type="password" name="password" placeholder="Password" required/><br>
                
                <input type="password" name="cpassword" placeholder="Confirm password" required/><br>
                
                <button class="login-button" type="submit" name="register">Register</button><br><br>

                <p>Already have an account? <a href="login.php">Login</a></p>
            </form>
        </div>
        
    </div>
</main>





<?php include '_footer.php';?>
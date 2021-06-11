<?php
include '_header.php';

if(isset($_POST['submit'])){
    include 'assets/php/connect.php';

    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date=date('Y-m-d H:i:s');

    $query="INSERT INTO messages (mName, mEmail, mMessage, mDate, mStatus) VALUES ('$name', '$email', '$message', '$date', '')";
    $result=mysqli_query($connect,$query);
    
    $_POST['error-message']='Message have been delivered.';
}

?>

<main>
    <div class="container">

        <!-- Contact -->
        <div class="card-white">
            <form class="form-message" method="post">
                <h2>Contact</h2><br>

                <?php
                    if(isset($_POST['error-message'])){
                        echo '<p class="error-message">'.$_POST['error-message'].'</p><br>';
                        $_POST['error-message']='';
                    }
                ?>

                <p>If you have any question, you can leave a message here.</p><br>
                <input type="text" name="name" placeholder="Your name" <?php
                    if(isset($_SESSION['uId'])){
                        echo ' value="'.ucwords($_SESSION['uName']).'"';
                    }
                ?> required/><br>
                <input type="email" name="email" placeholder="Your email" <?php
                    if(isset($_SESSION['uId'])){
                        echo ' value="'.$_SESSION['uEmail'].'"';
                    }
                ?> required/><br>
                <textarea name="message" placeholder="Your message here..." required></textarea><br>
                <button type="submit" name="submit">Leave a Message.</button>
            </form>
        </div>

    </div>
</main>

<?php include '_footer.php';?>
<?php
include '_header.php';

if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header('location: login.php');
}
elseif(isset($_POST['cancel'])){
    header('location: profile.php');
}


?>

<main>
    <div class="container">

        <!-- Login -->
        <div class="card-white">
            <form class="form-main" method="post">
                <h2>Logout?</h2><br>

                <button class="no-button" type="submit" name="cancel">No</button><button class="yes-button" type="submit" name="logout">Yes</button>

            </form>
        </div>
        
    </div>
</main>





<?php include '_footer.php';?>
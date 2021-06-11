<?php
include '_header.php';

if(isset($_POST['logout'])){
    header('location: logout.php');
}
?>

<main>
    <div class="container">

        <!-- Logout -->
        <div class="card-white">
            <form class="form-main" method="post">
                <h2><?php echo ucwords($_SESSION['uName']);?></h2><br>
                <button class="logout-button" type="submit" name="logout">Logout</button><br>
            </form>
        </div>

    </div>
</main>




<?php include '_footer.php';?>
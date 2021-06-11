<?php include '_header.php'; ?>


<main>
    <div class="container">

        <!-- About -->
        <div class="card-white">

            <form class="form-message" action="assets/php/product-new.php" method="post" enctype="multipart/form-data">
            <h2>Add New Product</h2><br>
            <input type="file" name="fileToUpload" id="fileToUpload" required/><br><br>
            <input type="text" name="name" placeholder="Product Name" required/><br><br>
            <textarea type="text" name="description" placeholder="Product description" required></textarea><br><br>
            <input type="number" name="price" placeholder="Price" required/><br><br>
            <button type="submit" name="submit">Add</button>
            </form>

        </div>
        

    </div>
</main>

<?php include '_footer.php'; ?>
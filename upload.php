<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Item</title>
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>

<div id="update-cont" class="flex-box-row">
    <div class="flex-box-column" style="flex: 1 1 50%;">
        <div class="flex-box-row padding-all-15" style="justify-content: end">
            <a href="admin.php">
                <button class="primary-btn"> Go back to item list</button>
            </a>
        </div>

        <form class="flex-box-column" style="width: 100%;align-items: center" method="post" action="php/uploadP.php" enctype="multipart/form-data">
            <h3>Add Item</h3>

            <div class="flex-box-column" style="width: 100%;align-items: center">
                <p class="label">Select Category</p>
                <select name="category">
                    <option>Computer</option>
                    <option selected>Cellphone</option>
                </select>
            </div>

            <div class="flex-box-column" style="width: 100%;align-items: center">
                <p class="label">Item Name</p>
                <input type="text" placeholder="name" name="name" required value="">
            </div>

            <div class="flex-box-column" style="width: 100%;align-items: center">
                <p class="label">Quantity</p>
                <input type="number" placeholder="x" name="qty" required value="">
            </div>

            <div class="flex-box-column" style="width: 100%;align-items: center">
                <p class="label">Price</p>
                <input type="number" placeholder="name" name="price" required>
            </div>

            <div class="flex-box-column" style="width: 100%;align-items: center">
                <p class="label">Select Image</p>
                <input type="file" accept="image/png, image/gif, image/jpeg" placeholder="name" name="image" style="border: none!important;" required>
            </div>

            <div class="flex-box-column margin-15-all" style="width: 100%;align-items: center">
                <button type="submit" class="primary-btn" style="width: 50%">
                    Add Item
                </button>
            </div>

        </form>

    </div>

    <div style="flex: 1 1 50%;">
        <img src="img/as2.jpg" style="width: 100%; height: 100vh">
    </div>

</div>

</body>
</html>
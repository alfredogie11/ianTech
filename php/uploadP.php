<?php
session_start();
$name = $_POST['name'];
$category = $_POST['category'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$img = $_FILES['image']['name'];
$img_tmp = $_FILES['image']['tmp_name'];

$trimmedImgName = implode("",explode(" ",$img));

$location = "items/$trimmedImgName";
move_uploaded_file($img_tmp,"../".$location);

$conn = mysqli_connect("localhost","root","","store");
$query = "INSERT into items (name,category,quantity,price,image)
VALUES ('$name' , '$category', $qty, $price, '$location' );
";

    mysqli_query($conn,$query);
header("location:../admin.php");
exit();



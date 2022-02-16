<?php
session_start();

if(!isset($_POST["ch"])&&$_POST["action"]=="2"){//delete
    header("location:../admin.php");
    exit();
}
elseif (!isset($_POST["ch"])&&$_POST["action"]=="1"){//update
    header("location:../admin.php");
    exit();
}

$ch = "";
if(isset($_POST["ch"])){
   $ch = $_POST["ch"];
   $_SESSION['item_id'] = $ch[0];//update the selected first item
}

$action = $_POST["action"];
$conn = mysqli_connect("localhost","root","","store");

if($action=="2"){
    foreach ($ch as $item_id){
        mysqli_query($conn,"DELETE FROM items WHERE id = $item_id");
    }
    header("location:../admin.php");
}
else if($action=="1"){
    header("location:../update.php");
}
else{
    header("location:../upload.php");
}

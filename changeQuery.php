<?php
session_start();
$action = $_POST['action'];
if($action=="0"){
    $_SESSION['query'] = "SELECT * FROM items WHERE category = 'Computer' ORDER BY category DESC";
}
else{
    $_SESSION['query'] = "SELECT * FROM items WHERE category = 'Cellphone' ORDER BY category DESC";
}
header("location:store.php");
<?php
session_start();
$_SESSION['username']="";
$_SESSION['acc_type']="";
$_SESSION['action_cat']="";
if(isset($_SESSION['query'])){
   $_SESSION['query']="SELECT * FROM items ORDER BY category DESC";
}
header("location:index.php");

<?php
session_start();
unset( $_SESSION['username']);
unset( $_SESSION['acc_type']);
if(isset($_SESSION['query'])){
    unset( $_SESSION['query']);
}
header("location:index.php");

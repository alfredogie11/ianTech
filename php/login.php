<?php
session_start();
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$conn = mysqli_connect("localhost","root","","store");

$query = mysqli_query($conn,"SELECT * FROM accounts WHERE username = '$uname' AND password = '$pwd' ");
if(mysqli_num_rows($query)>0){
   if($row = mysqli_fetch_assoc($query)){
       $_SESSION['username']= $uname;
       $_SESSION['acc_type']= $row['acc_type'];
       if($row['acc_type']==0){

           header("location:../admin.php");
       }
       else{
           header("location:../store.php");
       }
   }
}
else{
    header("location:../index.php");
    $_SESSION['show_err']=1;
}
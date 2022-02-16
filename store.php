<?php
session_start();
if($_SESSION['username']==""|| $_SESSION['acc_type']!=1){
    header("location:index.php");
}
$uname = $_SESSION['username'];
$conn = mysqli_connect("localhost","root","","store");
if(!isset($_SESSION['query'])){
    $_SESSION['query'] = "SELECT * FROM items ORDER BY category DESC";
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ian Tech</title>
    <link rel="stylesheet" href="css/layout.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav class="flex-box-row" style="background: var(--primary-color);">
    <div class="flex-box-row" style="flex:1 1 50%;justify-content: start;align-items: center;padding-left: 2rem" >
        <img src="img/logocircle.png" width="200" height="200">
        <p style="font-size: 3rem" class="white-text"> Ian Tech</p>
    </div>
    <div class="flex-box-row " style="flex:1 1 50%;justify-content: end;align-items: end;">
        <div style="background: white;padding-right: 1rem;align-items: center" class="flex-box-row">
            <p  style="margin: 0;padding: 15px;font-size: 1.4rem">Hello, <?php echo $uname?></p>
            <a href="session_destroy.php">
                <button class="primary-btn" style="">Log out</button>
            </a>

        </div>
    </div>
</nav>

<form id="filter" class="flex-box-row padding-all-15" style="justify-content: start;margin: 1rem" method="post" action="changeQuery.php">
    <button name="action" value="0" type="submit" class="primary-btn" style="color: var(--primary-color);margin-right:2rem;background: #cec8c8;border-radius: 0;font-size: 1.4rem!important;<?php if(isset($_SESSION['action_cat'])&&$_SESSION['action_cat']=="0"){echo "background:darkgrey;color:white";}?>">
        Computer
    </button>
    <button name="action" value="1" type="submit" class="primary-btn" style="color: var(--primary-color);margin-right: 0.5rem;background: #eeeded;border-radius: 0;font-size: 1.4rem!important;<?php if(isset($_SESSION['action_cat'])&&$_SESSION['action_cat']=="1"){echo "background:darkgrey;color:white";}?>" >
        Cellphone
    </button>
</form>

<div class="main-cont flex-box-column" style="margin-bottom: 5rem">

    <div class="items-cont flex-box-row" style="flex-wrap: wrap;justify-content: center;align-items: center">
        <?php
        $query = $_SESSION['query'];
        $result = mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($result)){
            echo " 
         <div class='item'> 
            <img src='".$row['image']."'>
            <h4>".$row['name']."</h4>
            <p class='label-2'><span style='font-weight: 600'>Category: </span>".$row['category']."</p>
            <p class='label-2'><span style='font-weight: 600'>Stock: </span>".$row['quantity']."pcs</p>
            <p class='label-2'><span style='font-weight: 600'>Price: $</span>".$row['price']."</p>
            
         </div>
         
         
         
         
         ";
        }
        ?>

    </div>
</div><!--end of main cont-->

</body>
</html>
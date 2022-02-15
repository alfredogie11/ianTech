<?php
session_start();
if(isset($_SESSION['username'])&&$_SESSION['acc_type']==0){
    header("location:admin.php");
}
else if(isset($_SESSION['username'])&&$_SESSION['acc_type']==1){
    header("location:store.php");
}
if(!isset($_SESSION['show_err'])){
    $_SESSION['show_err']=0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>


<div id="main-cont" class="flex-box-row">
    <div class="flex-box-column" style="flex: 1 1 50%;">

        <div id="login-cont" style="margin-top: 6rem">
            <div id="header-login" class="flex-box-row" style="justify-content: center">
                <img src="img/logo.png" style="width: 20vw;height: 25vh">
            </div>

            <form id="login-form" class="flex-box-column" style="align-items: center" method="post" action="php/login.php">
                    <input id="uname" name="uname" type="text" placeholder="Username" class="margin-15-all">


                    <input id="pwd" name="pwd" type="password" placeholder="Password" class="margin-15-all">


                    <button class="margin-15-all primary-btn" type="submit" id="login" style="width: 50%">Login</button>
            </form>

            <div class="flex-box-row" style="justify-content: center">
                <p id="err-msg"style="color: darkred;visibility: hidden">Invalid Username or Password!</p>
            </div>


        </div>

    </div>
    <div class="flex-box-column" style="flex: 1 1 50%">
       <img src="img/as2.jpg" style="width: 100%; height: 100vh">
    </div>
</div>

<script>
    function showError () {
        document.getElementById("err-msg").style.visibility = "visible"
    }
    function hideError() {
        document.getElementById("err-msg").style.visibility = "hidden"
    }

    document.getElementById("uname").addEventListener("click",hideError)
    document.getElementById("pwd").addEventListener("click",hideError)


</script>

<?php
if($_SESSION['show_err']==1){
    echo "<script>showError()</script>";
    $_SESSION['show_err']=0;
}
?>

</body>
</html>
<?php
session_start();
if($_SESSION['username']==""|| $_SESSION['acc_type']!=0){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/layout.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<nav class="flex-box-row" style="background: var(--primary-color)">
    <div style="display:flex;;flex: 1 1 50%;justify-content: start;padding-left: 2rem;align-items: center">
        <img src="img/logocircle.png"  width="120" height="120">
        <p style="font-size: 2rem" class="white-text">Ian Tech</p>
    </div>
    <div class="flex-box-row " style="flex:1 1 50%;justify-content: end;align-items: end;">
        <div style="background: white;padding: 0.5rem 1rem  0 1rem;align-items: center" class="flex-box-row">
            <p style="margin: 0 1rem;font-size: 1.4rem">Hello, <?php echo $_SESSION['username']?></p>
            <a href="session_destroy.php">
                <button class="primary-btn" style="">Log out</button>
            </a>

        </div>
    </div>
</nav>

<div>
    <h3 style="text-align: center">Item Lists</h3>
</div>

<div id="admin-cont" style="width: 100%;margin-bottom: 5rem">
    <div class="flex-box-column" style="align-items: center">
        <form method="post" action="php/action.php">
        <table>
            <tr id="thead">
                <th>Action</th>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Stocks</th>
                <th>Price</th>
            </tr>

            <?php
            $conn = mysqli_connect("localhost","root","","store");
            $query = mysqli_query($conn,"SELECT * FROM items");

            while ($row = mysqli_fetch_assoc($query)){
                echo "
                <tr> 
                    <td><input value='".$row['id']."' type='checkbox' name='ch[]'></td>
                    <td>".$row['id']."
                     <td>".$row['name']."</td>
                      <td>".$row['category']."</td>
                       <td>".$row['quantity']."</td>
                        <td>$".$row['price']."</td>
                </tr>
               
           
                ";
            }

            ?>


        </table>

            <div class="buttons flex-box-row" style="margin-top: 2rem;justify-content: end">
                <button name="action" value="0" type="submit" class="primary-btn" style="background: #15576a">
                    Add Item
                </button>
                <button name="action" value="1" type="submit"  class="primary-btn" style="background: #6a6d6d">
                    Update
                </button>
                <button name="action" value="2" type="submit"  class="primary-btn" style="background: #892434">
                    Remove
                </button>

            </div>
            <style>
                .buttons button{
                    margin: 0.5rem;
                    padding: 1rem 1.4em!important;
                }
            </style>

        </form>

    </div>
</div>

</body>
</html>
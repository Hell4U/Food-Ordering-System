<?php
session_start();
require 'connection.php';

if(!isset($_SESSION['login_user'])){
header("location: login.php"); 
}

if(empty($_SESSION['cart'])){
  header('location:foodpage.php');
}

$conn=Connect();
    foreach($_SESSION['cart'] as $key=>$value){
        $foodname=$value["food_name"];
        $foodid=(int)$value["food_id"];
        $qty=(int)$value["qty"];
        $total=(int)$qty*(int)$value["food_price"];
        $name=htmlspecialchars($_SESSION['login_user']);
        $order_date = date('Y-m-d');

        $sql="INSERT INTO ORDERS(F_ID,foodname,price,quantity,orderdate,username) VALUES($foodid,'$foodname',$total,$qty,'$order_date','$name')";
        // echo $sql;
        $sucess=$conn->query($sql);

        if(!$sucess){
            echo $conn->error;
        }
        
    }
    $conn->close();
    unset($_SESSION['cart']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La's Rest</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/foodpage.css">
</head>
<body>
    <nav>
        <div class="nav-section">
          <ul>
            <li><a href="#" >La's Rest</a></li>
          </ul>
        </div>

        <div class="detail-section">
          <ul>
            <li><a href="#"><span class="material-icons">account_circle</span> Welcome <?php echo $_SESSION['login_user']; ?></a></li>
            <li ><a href="foodpage.php" ><span class="material-icons" >restaurant </span>Food Zone</a></li>
            <li><a href="cart.php" style="background:#000;color:#fff;"><span class="material-icons">shopping_cart </span>Cart <?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?></a> </li>
              <li><a href="logout_u.php"><span class="material-icons">logout</span> Logout</a></li>
          </ul>
        </div>
      </nav>
    
      <?php 
        $num=rand(10,99999)*rand(10,99999)*rand(10,99999);
      ?>
      
        <div class="container">
            <div class="jumbotron">
                <h1 class="text-center">&#128516;Your order has been placed.</h1>
            </div>
        </div>
        <div class="container text-center">
            <h2>Thank you for choosing our La Rest for your takeout.</h2>
            <h2><strong>Your Order Id:-</strong><p class="text-primary"><?php echo $num; ?></p></h2>
        </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
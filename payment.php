<?php
session_start();
require 'connection.php';
$conn=Connect();
if(!isset($_SESSION['login_user'])){
header("location: login.php"); 
}

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
            $total=0;

            foreach ($_SESSION['cart'] as $key => $value) {
                # code...
                $gtotal=(int)$value['food_price']*$value['qty'];
                $total+=$gtotal;
            }
            ?>
                <div class="container">
                    <div class="jumbotron">
                        <center>
                        <h1 class="display-3">Choose your payment option:-</h1>
                        </center>
                    </div>
                </div>
                <h1 class="text-center text-success">Your toal:-&#8377;<?php echo $total?>/-</h1>
                <h5 class="text-center">all charges included.(Free home delivery)</h5>
                <div class="text-center">
                <a href="cart.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-circle-arrow-left"></span> Go back to cart</button></a>
                <a href="onlinepay.php"><button class="btn btn-success"><span class="glyphicon glyphicon-credit-card"></span> Pay Online</button></a>
                <a href="COD.php"><button class="btn btn-success"><span class="glyphicon glyphicon-"></span> Cash On Delivery</button></a>
                </div>
            <?
      ?>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
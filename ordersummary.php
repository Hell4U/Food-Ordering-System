<?php
session_start();

if(!isset($_SESSION['login_manager'])){
header("location: manager.php"); 
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
    <!-- CSS only -->

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/managerpage.css">
    <style>
        .form-area{
            background-color:#d4d4d4;
            border:1px solid black;
        }
    </style>
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
            <li><a href="#"><span class="material-icons">account_circle</span> Welcome <?php echo $_SESSION['login_manager']; ?></a></li>
            <li ><a href="managerpage.php" style="background:#000;color:#fff;"><span class="material-icons">manage_accounts</span> Manager Zone</a></li>
            <li><a href="logout_m.php"><span class="material-icons">logout</span> Logout</a></li>
          </ul>
        </div>
      </nav>

    <div class="container">
        <div class="jumbotron">
              <h2>Welcome to Manager Page <strong class="text-danger"><?php echo $_SESSION['login_manager']; ?>!</strong></h2>
              <p>Manage your restaurant</p>
        </div>
    </div>

    <div class="col-xs-3">
        <div class="list-group text-center">
            <a href="managerpage.php" class="list-group-item ">View Food Item</a>
            <a href="editfoodpage.php" class="list-group-item">Edit Food Item</a>
            <a href="addfooditem.php" class="list-group-item">Add Food Item</a>
            <a href="deletefooditem.php" class="list-group-item">Delete Food Item</a>
            <a href="ordersummary.php" class="list-group-item active">View Order Summary</a>
        </div>
    </div>
    
    <div class="col-xs-9">
      
      <div class="form-area" style="padding: 0px 100px 100px 100px;">
      <h1 class="text-center" style="font-size:26px">Your Order Summary</h1>
      <?php
      
          require 'connection.php';
          $conn=Connect();

          $sql = "SELECT * FROM orders  ORDER BY order_ID";

          $res=mysqli_query($conn, $sql);
          if(mysqli_num_rows($res)>0){
            ?>
            <table class="table table-responsive table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th></th>
                      <th>Order ID</th>
                      <th>Food ID</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Order Date</th>
                      <th>Customer</th>
                    </tr>
                  </thead>
                  <tbody>
            <?php
            while($row=mysqli_fetch_assoc($res)){

              ?>
                
                  
                    <tr>
                      <td> <span class="glyphicon glyphicon-menu-right"></span> </td>
                      <td><?php echo $row['order_id'];   ?></td>
                      <td><?php echo $row['F_ID'];   ?></td>
                      <td><?php echo $row['foodname'];   ?></td>
                      <td> &#8377;<?php echo $row['price'];   ?></td>
                      <td> <?php echo $row['quantity'];   ?></td>
                      <td> <?php echo $row['orderdate'];   ?></td>
                      <td><?php echo $row['username'];   ?></td>
                    </tr>
                  
               
              <?php
            }
            ?>
            </tbody>
             </table>
            <?php
          }
          else{ 
            ?>
            <h4 class="text-center text-danger"> No orders are there😲 </h4>
            <?php

          }
      ?>
      </div>
    </div>

<!-- JavaScript Bundle with Popper -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
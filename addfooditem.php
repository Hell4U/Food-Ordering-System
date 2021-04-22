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
            <a href="addfooditem.php" class="list-group-item active">Add Food Item</a>
            <a href="deletefooditem.php" class="list-group-item ">Delete Food Item</a>
            <a href="ordersummary.php" class="list-group-item ">View Order Summary</a>
        </div>
    </div>
    
    <div class="col-xs-9">
        <div class="form-area" style="padding:0 100px 100px 100px">
            <form action="additem.php" method="post" class="text-center">
                <h3>Add Your New Food Item 🍴</h3>

                <div class="form-group">
                    <input type="text" class="form-control" name="food-name" required placeholder="Your food name">
                </div>

                <div class="form-group">
                    <input type="number" min="1" class="form-control" name="food-price" required placeholder="Your food price (INR)">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="food-description" required placeholder="Your food description">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="food-image" required placeholder="Your image path [./images/filename.extension]">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary pull-right" name="add-btn" type="submit">Add Item</button>
                </div>
            </form>
        </div>
    </div>

<!-- JavaScript Bundle with Popper -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
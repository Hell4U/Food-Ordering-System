<?php
session_start();

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
            <li ><a href="foodpage.php" style="background:#000;color:#fff;"><span class="material-icons" >restaurant </span>Food Zone</a></li>
            <li><a href="cart.php"><span class="material-icons">shopping_cart </span>Cart <?php
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
        
      <div class="container fixer">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="./images/salad (1).jpg" alt="food" style="width:100%;">
      </div>

      <div class="item">
        <img src="./images/pizza.jpg" alt="food" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="./images/samosa.jpg" alt="food" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Welcome To La Rest</h1>      
   <p>Let food be thy medicine and medicine be thy food</p>
  </div>
</div>

<div class="grid-container">

    <!-- <div class="card-container">
        <div class="card">
            <div class="img-cotnainer">
                <img src="./images/Happy_Happy_Choco_Chip_Shake.jpg" alt="">
            </div>
            <form action="">
                <h4>Happy Choco Shake</h4>
                <h5 style="color:#7A5800;">Lose all senses over this very delicious chocolate hazelnut truffle.</h5>
                <h5 style="color:red;">&#8377 40/-</h5>
                <h5>Quantity</h5>
                <input type="number" min="1" max="20" name="product-qty" required style="width:50px" placeholder="1"><br>
                <input type="hidden" name="hidden_name">
                <input type="hidden" name="hidden_price">
                <input type="hidden" name="hidden_RID">
                <input type="submit" value="Add Item" name="add-btn">
            </form>
        </div>
    </div> -->
    
    <?php

    require 'connection.php';
    $conn = Connect();

    $sql = "SELECT * FROM FOOD WHERE options = 'ENABLE' ORDER BY F_ID";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
    {

    while($row = mysqli_fetch_assoc($result)){

    ?>
    <div class="card-container">
        <div class="card">
            <div class="img-cotnainer">
                <img src="<?php echo $row['image_path']; ?>" alt="food">
            </div>
            <form action="cart.php" method="post">
                <h4><?php echo $row['name']; ?></h4>
                <h5 style="color:#7A5800;"><?php echo $row["description"]; ?>.</h5>
                <h5 style="color:red;">&#8377; <?php echo $row["price"]; ?>/-</h5>
                <!-- <h5><?php echo $row['F_ID']; ?></h5> -->
                <h5>Quantity</h5>
                <input type="number" min="1" max="20" name="product-qty" required style="width:50px" value="1"><br>
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                <input type="hidden" name="food_id" value="<?php echo $row["F_ID"]; ?>">
                <input type="submit" value="Add Item" name="add-btn">
            </form>
        </div>
    </div>

    <?php } ?>
    
    <?php } 
    
    else{
    
    ?>
    </div>
    
    <div class="container">
    <div class="jumbotron">
      <center>
         <label style="margin-left: 5px;color: red;"> <h1>Right now no food is available</h1> </label>
        <p>Come back after some time...! :)</p>
      </center>
       
    </div>
  </div>

  <?php } ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
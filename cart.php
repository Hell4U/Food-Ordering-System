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
      
            if(!empty($_SESSION['cart'])){
            ?>
                <div class="container">
                    <div class="jumbotron">
                        <center>
                        <h1 >Your Cart Summary</h1>
                        <p>Hmm Look's Tasty &#128523; </p>
                        </center>
                    </div>
                </div>
                
                <div class="table-responsive" style="padding-left:100px; padding-right:100px;">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th width="40%">Food Name</th>
                                <th width="10%">Quantity</th>
                                <th width="20%">Price</th>
                                <th width="15%">Total Price</th>
                                <th width="5%">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                                $total=0;
                                $ord=0;
                                foreach($_SESSION["cart"] as $keys=>$values){
                                    ?>
                                    <tr>
                                        <td><?php echo $values["food_name"]; ?></td>
                                        <td><?php echo $values["qty"]; ?></td>
                                        <td>&#8377;<?php echo $values["food_price"]; ?>/-</td>
                                        <td>&#8377;<?php $total=(int)$values["food_price"]*(int)$values["qty"]; $ord+=$total; echo $total; ?>/-</td>
                                        <td><a href="cart.php?action=delete&id=<?php echo $values["food_id"]; ?>"><span class="text-danger">Delete</span></a></td>
                                    </tr>
                                    <?php
                                }
                                   ?>
                                   <tr width="100%">
                                       <td colspan='4' align="right">Total</td>
                                       <td align="right">&#8377;<?php echo $ord; ?>/-</td>
                                   </tr>
                                   <?php
                           ?>
                        </tbody>
                    </table>
                    <div class="btn-container">
                        <div class="grp-1">
                        <a href="cart.php?action=empty"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Empty Cart</button></a>
                    <a href="foodpage.php"><button class="btn btn-warning">Continue Shopping</button></a>
                    
                        </div>
                        <div class="grp-2">
                        <a href="payment.php"><button class="btn btn-success pull-right"><span class="glyphicon glyphicon-share-alt"></span> Check Out</button></a>
                        </div>
                    </div>
                </div>
                
            <?php
            }
            if(empty($_SESSION['cart'])){
                ?>
                    <div class="container">
                        <div class="jumbotron">
                            <center>
                            <h1 class="display-3">Your cart summary</h1>
                            <p>It's empty we cannot find any food &#128552;. Order right <a href="foodpage.php">now</a></p>
                            </center>
                        </div>
                    </div>
                <?php
            }
      ?>

    <?php
        if(isset($_POST['add-btn'])){

           if(isset($_SESSION['cart'])){
                $item_array_id = array_column($_SESSION["cart"], "food_id");
                
                if(!in_array($_POST['food_id'],$item_array_id)){
                    $food_id=htmlspecialchars($_POST['food_id']);
               $food_name=htmlspecialchars($_POST['hidden_name']);
               $food_price=htmlspecialchars($_POST['hidden_price']);
               $qty=htmlspecialchars($_POST['product-qty']);

                    $cnt=count($_SESSION["cart"]);

                    $item_array=array(
                        "food_id"=>$food_id,
                        "food_name"=>$food_name,
                        "qty"=>$qty,
                        "food_price"=>$food_price
                    );

                    $_SESSION['cart'][$cnt]=$item_array;

                }
                else{
                    echo '<script>alert("Products are already present in cart.")</script>';
                    echo '<script>window.location="cart.php"</script>';
                }
                header("Location:cart.php");
           }
           else{
               $food_id=htmlspecialchars($_POST['food_id']);
               $food_name=htmlspecialchars($_POST['hidden_name']);
               $food_price=htmlspecialchars($_POST['hidden_price']);
               $qty=htmlspecialchars($_POST['product-qty']);

            //    echo "$food_id $food_name $food_price $qty";
                $item_array=array(
                    "food_id"=>$food_id,
                    "food_name"=>$food_name,
                    "qty"=>$qty,
                    "food_price"=>$food_price
                );

                // print_r($item_array);
                $_SESSION['cart'][0]=$item_array;
           }
        }

        if(isset($_GET['action'])){
            if($_GET['action']=='delete'){
                foreach($_SESSION['cart'] as $keys=>$values){
                    if($values['food_id']==$_GET['id']){
                        unset($_SESSION['cart'][$keys]);
                        echo '<script>alert("Food has been removed")</script>';
                        echo '<script>window.location="cart.php"</script>';
                        // header("Location:cart.php");
                    }
                }
            }
        }

        if(isset($_GET['action'])){
            if($_GET['action']=='empty'){
                unset($_SESSION['cart']);
                echo '<script>alert("Cart has been emptied.")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
    ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
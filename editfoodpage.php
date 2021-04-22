<?php
session_start();
include('filter.php');
require 'connection.php';
$conn=Connect();
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
            <a href="editfoodpage.php" class="list-group-item active">Edit Food Item</a>
            <a href="addfooditem.php" class="list-group-item ">Add Food Item</a>
            <a href="deletefooditem.php" class="list-group-item ">Delete Food Item</a>
            <a href="ordersummary.php" class="list-group-item ">View Order Summary</a>
        </div>
    </div>
    
    <div class="col-xs-3">
        <div class="form-area" style="padding:10px;">
            <h3 class="text-center">Click On Menu</h3>
            <?php
    
                if(isset($_POST['upd-btn'])){
                    // echo "hello";
                    $opt="DISABLE";
                    if(isset($_POST['noption']))
                        $opt="ENABLE";
                    
                    $fid=$_POST['nfid'];
                    $name=$conn->real_escape_string(filt($_POST['nname']));
                    $price=$conn->real_escape_string(filt($_POST['nprice']));
                    $desc=$conn->real_escape_string(filt($_POST['ndescription']));

                    $sql="UPDATE FOOD SET name='$name',price='$price',description='$desc',`options`='$opt' WHERE F_ID='$fid'";
                    $conn->query($sql);
                    echo"<script>alert('Your data has been updated');</script>";
                    unset($_POST['upd-btn']);
                }

                $sql="SELECT * FROM FOOD ORDER BY F_ID";
                $res=$conn->query($sql);
                
                if(mysqli_num_rows($res)>0){
                    while($row=mysqli_fetch_array($res)){
                        ?>
                            <div class="list-group text-center">
                                <a href="editfoodpage.php?update=<?php echo $row['F_ID'] ?>"><?php echo $row['name'];?></a>
                            </div>
                        <?php
                    }
                }
                else{
                    echo "<h3>Sorry</h3>";
                }
            ?>

        </div>
    </div>
    
    <?php
        if(isset($_GET['update'])){

            // echo $_GET['update'];
            $num=$_GET['update'];
            $sql="SELECT * FROM FOOD WHERE F_ID='$num'";

            $res=$conn->query($sql);

            while($row=mysqli_fetch_array($res)){
                ?>
            <div class="col-xs-6">
                <div class="form-area" style="0px 100px 100px 100px;">
                        <form action="editfoodpage.php" method="POST">
                            <h3 class="text-center">Edit your items</h3>

                            <div class="form-group">
                                <input class='input' type='hidden' name="nfid" value=<?php echo $row['F_ID'];  ?> />
                            </div>

                            <div class="form-group">
                                <label for="dname"><span class="text-danger" style="margin-right: 5px;">*</span> Food Name: </label>
                                <input type="text" class="form-control" id="dname" name="nname" value="<?php echo $row['name'];  ?> " placeholder="Your Food name" required>
                            </div>  

                            <div class="form-group">
                                <label for="dprice"><span class="text-danger" style="margin-right: 5px;">*</span> Food Price: </label>
                                <input type="number" class="form-control" id="dprice" name="nprice" value=<?php echo $row['price'];  ?> placeholder="Your Food price" required min="1">
                            </div>  

                            <div class="form-group">
                                <label for="ddes"><span class="text-danger" style="margin-right: 5px;">*</span> Food Description: </label>
                                <input type="text" class="form-control" id="ddes" name="ndescription" value="<?php echo $row['description'];  ?>" placeholder="Your Food description" required >
                            </div> 

                            <div class="form-group">
                                <label for="enable"><span class="text-danger" style="margin-right: 5px;">*</span> Enable item: </label>
                                <input type="checkbox" class="form-control" id="enable" name="noption" value="<?php echo $row['F_ID'];  ?>" placeholder="Your Food description" <?php 
                                    if($row['options']=='ENABLE')
                                        echo "Checked";
                                ?> >
                            </div> 

                            <input type="submit" class="btn btn-primary" value="Update" name="upd-btn">
                        </form>
                </div>
            </div>

            <?php
            }
            
        }
    ?>

<!-- JavaScript Bundle with Popper -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
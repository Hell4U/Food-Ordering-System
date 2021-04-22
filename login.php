<?php
include('login_u.php');

if(isset($_SESSION['login_user']))
  header("Location:foodpage.php");
?>


<!-- Enter php code above of session start and check if user is already present using session -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/login.css">
</head>
<body>
  
  <main>
    <div class="container">
      <nav>
        <div class="nav-section">
          <ul>
            <li><a href="index.php" >La's Rest</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
          </ul>
        </div>

        <div class="detail-section">
          <ul>
            <li><a href="login.php" style="background-color: rgb(97, 97, 97); color:white;">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="manager.php">Manager</a></li>
          </ul>
        </div>
      </nav>

      <section>
          <div class="frm-container">
                
                <div class="title">
                    <h6>
                        Login            
                    </h6>
                </div>

              <form action="" method="post">

                  <div class="input-label">
                      <label for="username">Username</label>
                      <input type="text" name="username" id="username" required pattern="^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$"><span style="color:yellow;"> *</span>
                  </div>

                  <div class="input-label">
                      <label for="password">Password</label>
                      <input type="password" name="userpass" id="password" required><span style="color:yellow;"> *</span>
                  </div>

                  <input type="submit" value="Submit" id="login-btn" class="btn" name="user-btn">

              </form>

              <div class="error">
                    <!-- Enter php code for error display -->
                    <?php
                        // $err="Enter the username in alphanumeric and .- format";
                        echo $err;
                    ?>
                </div>
          </div>
      </section>
  </div>

    <div class="image-blur"></div>
  </main>

</body>
</html>
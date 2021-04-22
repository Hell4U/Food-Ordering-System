<?php
  include('customersignup.php');
?>
<!-- Enter php code above of session start and check if user is already present using session -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/signup.css">
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
            <li><a href="login.php" >Login</a></li>
            <li><a href="signup.php" style="background-color: rgb(97, 97, 97); color:white;">Sign Up</a></li>
            <li><a href="manager.php" >Manager</a></li>
          </ul>
        </div>
      </nav>

      <section> 
            <div class="demo">
            Registration Successfull<p> <a href="login.php"> Click Here </a></p> for login.  
            </div>
           
      </section>
  </div>

    <div class="image-blur"></div>
  </main>

</body>
</html>
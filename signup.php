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
            <div class="registration">
                      <div class="title">
                          <h6>
                              Registration          
                          </h6>
                      </div>

                  <form action="" method="post">

                      <div class="input-label">
                          <label for="fullname">Fullname</label>
                          <span style="color:yellow;"><input type="text" name="fullname" id="fullname" required pattern="^[a-zA-Z]+(([ ][a-zA-Z ])?[a-zA-Z]*)*$"> *</span>
                      </div>

                      <div class="input-label">
                          <label for="username">Username</label>
                          <span style="color:yellow;"><input type="text" name="username" id="username" required pattern="^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$"> *</span>
                      </div>

                      <div class="input-label">
                          <label for="usermail">Email</label>
                          <span style="color:yellow;"><input type="text" name="usermail" id="usermail" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$"> *</span>
                      </div>

                      <div class="input-label">
                          <label for="password">Password</label>
                          <span style="color:yellow;"><input type="password" name="userpass" id="password" required> *</span>
                      </div>

                      <div class="input-label">
                          <label for="useraddress">Address</label>
                          <span style="color:yellow;"><textarea name="useraddress" id="" cols="60%" rows="2" id="useraddress"></textarea> *</span>
                      </div>

                      <div class="input-label">
                          <label for="userphone">Phone</label>
                          <span style="color:yellow;"><input type="tel" name="userphone" id="userphone" required pattern="\b^[1-9]{1}[0-9]{9}\b"> *</span>
                      </div>

                      <input type="submit" value="Submit" id="login-btn" class="btn" name="sign-user-btn">

                  </form>
            </div>

                <div class="error">
                  <p>
                    <?php
                      

                      echo $err;
                    ?>
                  </p>
                </div>   
      </section>
  </div>

    <div class="image-blur"></div>
  </main>

</body>
</html>
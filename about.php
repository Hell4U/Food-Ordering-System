<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/index.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>
<body>
  
  <main>
    <div class="container">
      <nav>
        <div class="nav-section">
          <ul>
            <li><a href="index.php" >La's Rest</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php" style="background-color: rgb(97, 97, 97); color:white;">About</a></li>
          </ul>
        </div>

        <div class="detail-section">
          <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="manager.php">Manager</a></li>
          </ul>
        </div>
      </nav>

      <section>
        <div class="card">
            <div class="img-container">
                <img src="./images/burger.jpg" alt="photo" id="person-img"></img>
            </div>
            <div class="about">
                <h6 id="person-name">Neel Mungra</h6>
                <p id="person-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam non porro suscipit sapiente necessitatibus numquam ipsam eaque magnam veniam culpa.</p>   
            </div>
            <div class="btn-container">
                <button class="btn" id="prev-btn"><span class="material-icons">arrow_back_ios</span></button>
                <button class="btn" id="next-btn"><span class="material-icons">arrow_forward_ios</span></button>
            </div>
        </div>
      </section>
  </div>
    <div class="image-blur"></div>
  </main>

<script src="./js/about.js"></script>
</body>
</html>
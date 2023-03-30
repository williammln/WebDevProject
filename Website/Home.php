<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Website</title>
  <script src="Home.js"></script>
  <link rel="stylesheet" href="Home.css">
</head>
<body>
  <header>
    <div class="logo">
      <img src="Logo2.png" alt="Logo">
    </div>
    <nav>
      <ul>
        <li><a href="Home.php">Home</a></li>
        <li><a href="#">Menu</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
        <?php
          if(isset($_SESSION["email"])) {
            echo '<li><a href="/Website/logout.php">Log Out</a></li>';
          } else {
            echo '<li><a href="/Website/login.php">Log In</a></li>';
          }
        ?>
      </ul>
    </nav>
  </header>
  
  <div class="carousel-container">
    <div class="carousel-slide">
      <img src="background2.png" alt="slide image 1">
      <img src="background.png" alt="slide image 2">
      <img src="background3.jpg" alt="slide image 3">
    </div>
    <button class="carousel-prev">&#10094;</button>
    <button class="carousel-next">&#10095;</button>
  </div>
  <nav class="menu">
  <ul>
    <li><a href="#services">Services</a></li>
  </ul>
</nav>

<section id="services">
  <div class = "Heading_1">
    <h1> Our Services  </h1>
  <div class="button-container">
    <div class="button-row">
      <a href="Workouts.html" class="button"><img src="Workouts.png" alt="Button 1"></a>
      <a href="CalorieCalc.html" class="button"><img src="CalorieCalc.png" alt="Button 2"></a>
      <a href="Nutrition.html" class="button"><img src="Nutrition.png" alt="Button 3"></a>
    </div>
    <div class="button-row">
      <a href="BMI.html" class="button"><img src="BMI.png" alt="Button 4"></a>
      <a href="#" class="button"><img src="Challenges.png" alt="Button 5"></a>
      <a href="#" class="button"><img src="Meditation.png" alt="Button 6"></a>
    </div>
  </div>
</section>

</body>
<p><a href="logout.php">Logout</a></p>
<footer>
    <?php
      if(isset($_SESSION["email"])) {
        echo "<h3>You are logged in as ".$_SESSION["email"]."</h3>";
      } else {
        echo "<h3>You are not logged in</h3>";
      }
    ?>
  </footer>
</html>






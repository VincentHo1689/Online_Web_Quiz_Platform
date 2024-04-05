<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <title>Login Page</title>
  <link rel="icon" href="">
</head>
<body>
  <?php
    $conn = mysqli_connect("localhost", "root","","newdatabase");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }
  ?>

  <div class="topnav">
    <a href="index.html">AlphaQuiz</a>
    <a href="login.html" class="split">Login</a>
    <a href="aboutus.html" class="split">About Us</a>
    <a href="index.html" class="split">Home</a>
  </div> 
  <br>

  <div class="bg-rect">
    <br>
  <form style="text-align: center;" action="check_login.php">
    <h3 style="text-align: center;">Login As:</h3>
    <input type="radio" id="student" name="login_role" value="teacher">
    <label for="student">Student </label>
    <input type="radio" id="teacher" name="login_role" value="student">
    <label for="teacher">Teacher </label><br>
    <br>
    <label for="username">Username:</label> 
    <input type="text" id="username" name="username" value="Enter your username here"><br><br>
    <label for="pw">Password:</label>
    <input type="text" id="pw" name="pw" value="Enter password here"><br><br>
    <input type="submit" value="Login" >
  </form> 
  <br></div>
  
  <br>
  <p style="text-align: center;">    You don't have a account? Sign up
    <a id="journey" class="tbhover tbcontent" href="signup.html">here</a>!
    <br> <br>Be a guest user* by pressing
    <a id="journey" class="tbhover tbcontent" href="main_g.html">here</a>!
    <br><br><br>*As a guest user, your progress will not be saved!</p>
</p>
<div class="copyright"><br><p style="margin: auto; text-align: center;">Copyright © 2024, Kahoot! All Rights Reserved.
</p></div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../function/style.css">
  <script src="../function/script.js"></script>
  <title>Do a Quiz</title>
  <link rel="icon" href="">
</head>
<body onload="function()">
  <?php 
    
      ini_set('display_errors', '1');
      ini_set('display_startup_errors', '1');
      error_reporting(E_ALL);
    
      $QuizName = $_POST["QuizName"];
      
      $conn = mysqli_connect("localhost", "root","","COMP3421");
      $sql = "SELECT QuizID FROM Quiz WHERE name = '$QuizName'";
      $result = mysqli_query($conn, $sql);
      $row = $result->fetch_assoc();
      $QuizID = $row['QuizID'];
      echo "<script>  document.cookie = 'QuizID = $QuizID; path=/'; </script>";
      setcookie('QNum', 1);

      $sql = "SELECT COUNT(*) AS cnt FROM Question WHERE QuizID = '$QuizID'";
      $result = mysqli_query($conn, $sql);
      $row = $result->fetch_assoc();
      $QuizNum = $row['cnt'];
  ?>


  <h1><?= "There are total ".$QuizNum." questions."?></h1>
  
  <form action="Quiz.php" method="post">
    <td><input type="submit" value="Start Quiz"></td>
    <input type="hidden" name='QuizID' value='<?= $QuizID ?>'>
  </form>

</body>
</html>

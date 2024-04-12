<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../function/style.css">
  <script src="../function/script.js"></script>
  <title>Create Question</title>
  <link rel="icon" href="">
</head>
<body>
    
  <?php
    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    $QuizID = $_COOKIE['QuizID'];
    $QNum = $_COOKIE['QNum'];
    $sql = "SELECT Content FROM Question WHERE QuizID = '$QuizID' ORDER BY QuestionID";
    $result = mysqli_query($conn, $sql);

    for ($i = 0; $i < $QNum; $i++) {
        $row = $result->fetch_assoc();
    }
    #$Qnum = (int) $QNum +1;
    echo "<script>  document.cookie = 'QNum = $QNum; path=/'; </script>";
  ?>

    <h1>Question <?= $QNum ?>:</h1>
    <h1><?= $row['Content']; ?></h1><br>

  <form action="quizquestioncheck.php" method="post">

    <label for="username">Option 1:</label><br>
    <input type="checkbox" id="o1r" name="o1r" value=""><br>
    <label for="username">Option 2:</label><br>
    <input type="checkbox" id="o2r" name="o2r" value=""><br>
    <label for="username">Option 3:</label><br>
    <input type="checkbox" id="o3r" name="o3r" value=""><br>
    <label for="username">Option 4:</label><br>
    <input type="checkbox" id="o4r" name="o4r" value=""><br><br>
    <button type = "submit">Next Question</button><br><br>
  
  </form> 

</body>
</html>
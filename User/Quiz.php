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

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $QuizID = $_COOKIE['QuizID'];
    $QNum = $_COOKIE['QNum'];

    # SQL nth Question
    $sql = "SELECT Content, QuestionID FROM Question WHERE QuizID = '$QuizID' ORDER BY QuestionID";
    $Question = mysqli_query($conn, $sql);
    for ($i = 0; $i < $QNum; $i++) {
        $row = $Question->fetch_assoc();
    }

    $QContent = $row['Content'];
    $QuestionID = $row['QuestionID'];

    $sql = "SELECT SUM(Answer) AS N FROM Answer WHERE QuestionID = '$QuestionID' ORDER BY AnswerNum";
    $Num = mysqli_query($conn, $sql);
    $ANum = $Num->fetch_assoc();
  ?>

  <h1>Question <?= $QNum ?>:</h1>
  <h1><?= $QContent ?></h1><br>
  <h2>There are <?= $ANum['N'] ?> answer in this question.</h2><br>

  <form action="quizcheck.php" method="post">
  <?php
    $sql = "SELECT Content FROM Answer WHERE QuestionID = '$QuestionID' ORDER BY AnswerNum";
    $Answer = mysqli_query($conn, $sql);
    $A1 = $Answer->fetch_assoc();
    $A2 = $Answer->fetch_assoc();
    $A3 = $Answer->fetch_assoc();
    $A4 = $Answer->fetch_assoc();
  ?>

    <label for="A1"> <?= $A1['Content'] ?></label>
    <input type="checkbox" id="A1" name="A1" value=""><br>

    <label for="A2"> <?= $A2['Content'] ?></label>
    <input type="checkbox" id="A2" name="A2" value=""><br>

    <label for="A3"> <?= $A3['Content'] ?></label>
    <input type="checkbox" id="A3" name="A3" value=""><br>

    <label for="A4"> <?= $A4['Content'] ?></label>
    <input type="checkbox" id="A4" name="A4" value=""><br><br>
    <?php
      $sql = "SELECT COUNT(*) AS cnt FROM Question WHERE QuizID = '$QuizID'";
      $result = mysqli_query($conn, $sql);
      $row = $result->fetch_assoc();
      $TotalQ = $row['cnt'];
      if ($TotalQ ==  $QNum){
        echo "<button type = 'submit'>Finish Quiz</button><br>";
      }
      else{
        echo "<button type = 'submit'>Next Question</button><br>";
      }
    ?>
    
  
  </form> 

</body>
</html>
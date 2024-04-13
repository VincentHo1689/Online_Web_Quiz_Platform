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
  <br>
<div class="bg-rectphp">
  <br>
    <h1 style="font-size: 5vh; text-align: center;" >Input the question and options.</h1>
    <h2 style="font-size: 4vh; text-align: center;">
        If the option(s) is/are correct, fill in the circle on the right of the corresponding option.
    </h2><br>

  <?php
    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    $quiz_id = $_COOKIE['quizID'];
    $sql = "SELECT COUNT(QuestionID) AS Q_num FROM Question WHERE QuizID = '$quiz_id'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $Qnum = (int) $row["Q_num"] +1;
  ?>
  <form action="quizquestionsave.php" method="post" style=" font-size: 2.6vh;">
  <div style= "margin-left:  33%;">
    <label for="username">Question <?= $Qnum ?>:</label><br>
    <input type="text" id="question" name="question" value=""><br><br>
    <label for="username">Option 1:</label><br>
    <input type="text" id="o1" name="o1" value="">
    <input type="checkbox" id="o1r" name="o1r" value=""><br><br>
    <label for="username">Option 2:</label><br>
    <input type="text" id="o2" name="o2" value="">
    <input type="checkbox" id="o2r" name="o2r" value=""><br><br>
    <label for="username">Option 3:</label><br>
    <input type="text" id="o3" name="o3" value="">
    <input type="checkbox" id="o3r" name="o3r" value=""><br><br>
    <label for="username">Option 4:</label><br>
    <input type="text" id="o4" name="o4" value="">
    <input type="checkbox" id="o4r" name="o4r" value=""><br><br>
  </div>
    <div style="text-align: center;">
    <button type = "submit">Save and Next Question</button><br><br>
    <button type = "submit" formaction = "quizquestiondone.php">Save and Submit</button><br><br>
  </div>
  </form>
  </div>
</body>
</html>

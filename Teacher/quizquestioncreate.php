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
    <h1>Input the question and options.<br>
        If the option(s) is/are correct, fill in the circle on the right of the corresponding option.
    </h1><br>
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
  <form action="quizquestionsave.php" method="post">
    <label for="username">Question <?= $Qnum ?>:</label><br>
    <input type="text" id="question" name="question" value=""><br>
    <label for="username">Option 1:</label><br>
    <input type="text" id="o1" name="o1" value="">
    <input type="checkbox" id="o1r" name="o1r" value=""><br>
    <label for="username">Option 2:</label><br>
    <input type="text" id="o2" name="o2" value="">
    <input type="checkbox" id="o2r" name="o2r" value=""><br>
    <label for="username">Option 3:</label><br>
    <input type="text" id="o3" name="o3" value="">
    <input type="checkbox" id="o3r" name="o3r" value=""><br>
    <label for="username">Option 4:</label><br>
    <input type="text" id="o4" name="o4" value="">
    <input type="checkbox" id="o4r" name="o4r" value=""><br><br>
    <button type = "submit">Save and Next Question</button><br><br>
    <button type = "submit" formaction = "main_t.html" onclick = "removeCookie('QuizID'); ">Save and Submit</button><br><br>
  </form> 
</body>
</html>
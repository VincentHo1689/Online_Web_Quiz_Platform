<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../function/style.css">
  <script src="../function/script.js"></script>
  <title>Main Page</title>
  <link rel="icon" href="">
</head>
<body style="background-color: bisque;">
  <div class="topnav">
    <a href="../index.html">AlphaQuiz</a>
    <a href="../login/login.html" class="split">Logout</a>
    <a href="../other/aboutus.html" class="split">About Us</a>
    <a href="main_s.html" class="split">Home</a>
  </div>
<div style="margin: auto; width: 100%; text-align:center;">
<div><h1 style="display: inline-block;">Past Statistics</h1></div>
<div class="userstat" style="margin: auto; text-align:center;">
  <table class="tabletext">
        <tr>
          <th>Quiz Name</th>
          <th>Score</th>
          <th>Full Score</th>
        </tr>
        <?php 
      
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
      
        $SID = $_COOKIE["ID"];

        $conn = mysqli_connect("localhost", "root","","COMP3421");
        $sql = "SELECT DISTINCT Q.name AS name FROM Quiz AS Q,Question AS QU ,Stat AS S 
        WHERE S.StudentID ='$SID' AND S.QuestionID = QU.QuestionID AND QU.QuizID = Q.QuizID"; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
        $quizName=$row['name'];
        $sql2 = "SELECT * FROM Quiz AS Q, Question AS QU ,Stat AS S 
        WHERE S.StudentID ='$SID' AND S.QuestionID = QU.QuestionID AND QU.QuizID = Q.QuizID
        AND Q.name ='$quizName' AND S.Correct = 1";
        $result2 = mysqli_query($conn, $sql2);
        $result2 = mysqli_num_rows($result2);
        ?> <tr>
                <td><?php echo $quizName ?></td>
                <td><?php echo $result2 ?></td> 
        <?php 
        $sql3 = "SELECT * FROM Quiz AS Q, Question AS QU ,Stat AS S 
        WHERE S.StudentID ='$SID' AND S.QuestionID = QU.QuestionID AND QU.QuizID = Q.QuizID
        AND Q.name ='$quizName'";
        $result3 = mysqli_query($conn, $sql3);
        $result3 = mysqli_num_rows($result3); ?>
                <td><?php echo $result3 ?></td>
        </tr>
        <?php }
        ?>  
      </table>
        </div>
        </div>
</body>
</html>

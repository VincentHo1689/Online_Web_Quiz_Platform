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

<h1>Past Statistics</h1>

<table>
        <Tr>
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
        $sql = "SELECT DISTINCT Q.name FROM Quiz AS Q,Question AS QU ,Stat AS S 
        WHERE S.StudentID ='$SID' AND S.QuestionID = QU.QuestionID AND QU.QuizID = Q.QuizID"; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
        $quizName=$row['Q.name'];
        $sql2 = "SELECT COUNT(*) FROM Quiz AS Q,Question AS QU ,Stat AS S 
        WHERE S.StudentID ='$SID' AND S.QuestionID = QU.QuestionID AND QU.QuizID = Q.QuizID
        AND Q.name ='$quizName' AND S.Correct = 1";
        $sql3 = "SELECT COUNT(*) FROM Quiz AS Q,Question AS QU ,Stat AS S
        WHERE S.StudentID ='$SID' AND S.QuestionID = QU.QuestionID AND QU.QuizID = Q.QuizID
        AND Q.name ='$quizName'";
        echo "<tr>
                <td>$quizName</td>
                <td>mysqli_query($conn, $sql2)</td>
                <td>mysqli_query($conn, $sql3)</td>
              </tr>";
        }
        ?>  
      </table>
</body>
</html>
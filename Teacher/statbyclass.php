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
          <th>Class Name</th>
          <th>Quiz Name</th>
          <th>Average</th>
          <th>Full Score</th>
        </tr>
        <?php 
      
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
      
        $TeacherID = $_COOKIE["ID"];

        $conn = mysqli_connect("localhost", "root","","COMP3421");


        $sql = "SELECT DISTINCT C.name AS cname, Q.name AS name 
                FROM Quiz AS Q,Question AS QU ,Stat AS S, ClassName AS C
                WHERE S.StudentID IN (SELECT StudentID
                                      FROM Class
                                      WHERE ClassID IN (SELECT ClassID 
                                                        FROM ClassName
                                                        WHERE TeacherID = $TeacherID))
                  AND S.QuestionID = QU.QuestionID 
                  AND QU.QuizID = Q.QuizID
                  AND C.ClassID = Q.ClassID;"; 


        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
          $className=$row['cname'];
          $quizName=$row['name'];
          ?> <tr>
              <td><?php echo $className ?></td>
              <td><?php echo $quizName ?></td> 
          <?php 

          $sql2 = "SELECT (SUM(S.Correct)/COUNT(S.Correct))*COUNT(S.Correct) AS Average 
                    FROM Quiz AS Q, Question AS QU ,Stat AS S 
                    WHERE S.QuestionID = QU.QuestionID 
                      AND QU.QuizID = Q.QuizID
                      AND Q.name ='$quizName'";

          $result2 = mysqli_query($conn, $sql2);
          $row = $result2 -> fetch_assoc();
          $Average = $row['Average'];
          ?> 
              <td><?php echo $Average ?></td> 
          <?php 

          $sql3 = "SELECT COUNT(*) AS Total
                    FROM Quiz AS Q, Question AS QU
                    WHERE QU.QuizID = Q.QuizID
                      AND Q.name ='$quizName'";

          $result3 = mysqli_query($conn, $sql3);
          $row = $result3 -> fetch_assoc();
          $Total = $row['Total']; ?>

              <td><?php echo $Total ?></td>
          </tr>
        <?php }
        ?>  
      </table>
        </div>
        </div>
        <div style="margin: 3vh auto; text-align: center;">
          <button class="rect-arrowhome" onclick="window.location.href='main_t.html'"> <h4>Back to main page</h4></button>
        </div>
</body>
</html>

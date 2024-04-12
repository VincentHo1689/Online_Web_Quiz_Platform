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

  <table>
    <Tr>
      <th>Quiz Name</th>
      <th>Class Name</th>
    </tr>
    <?php 
  
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
  
    $ID = $_COOKIE["ID"];
  
    $conn = mysqli_connect("localhost", "root","","COMP3421");
    $sql = "SELECT Q.name AS Q, C.name AS C FROM Quiz AS Q, ClassName AS C WHERE C.ClassID = Q.ClassID AND (Q.ClassID = 0 OR Q.ClassID = ANY(SELECT ClassID FROM Class Where StudentID = '$ID')) ORDER BY Q.ClassID";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
    $Qname=$row['Q'];
    $Cname=$row['C'];
    ?>
    <Tr>
        <td><?= $Qname ?></td>
        <td><?= $Cname ?></td>

        <form action="StartQuiz.php" method="post">
          <td><input type="submit" value="Do Quiz"></td>
          <input type="hidden" name='QuizName' value='<?= $Qname ?>'>
        </form>
    </tr>
      

    <?php
    }
    ?>  
  </table>

  <a id="journey" class="tbhover tbcontent" href="main_s.html">Back to main page</a>!
</body>
</html>

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
<body onload="function()" style="font-size: 3vh;">
<br>
<div class="bg-rectphp">
  <table class="centered">
    <Tr>
      <th>Quiz Name</th>
      <th>Class Name</th>
    </tr>
    <?php 
  
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
  
    $conn = mysqli_connect("localhost", "root","","COMP3421");
    $sql = "SELECT Q.name AS Q, C.name AS C FROM Quiz AS Q, ClassName AS C WHERE C.ClassID = Q.ClassID AND Q.ClassID = 0 ORDER BY Q.ClassID";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
    $Qname=$row['Q'];
    $Cname=$row['C'];
    ?>
    <Tr>
        <td><?= $Qname ?></td>
        <td><?= $Cname ?></td>

        <form action="StartQuiz_g.php" method="post">
          <td><input style="cursor: pointer;" type="submit" value="Do Quiz"></td>
          <input type="hidden" name='QuizName' value='<?= $Qname ?>'>
        </form>
    </tr>
      

    <?php
    }
    ?>  
  </table>
  <br>
  </div>
  <button style="margin-top: 5%" class="rect-arrowhome" onclick="window.location.href='main_g.html'"> <h4 style="font-size: 2vh;">Back to main page!</h4></button>

</body>
</html>

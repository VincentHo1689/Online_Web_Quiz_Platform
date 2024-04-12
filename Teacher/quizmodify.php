<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../function/style.css">
  <script src="../function/script.js"></script>
  <title>Manage Class</title>
  <link rel="icon" href="">
</head>
<body>

<h1>Created Quiz</h1>

<table>
  <Tr>
    <th>Quiz ID</th>
    <th>Quiz Name</th>
    <th>Connected Class</th>
  </tr>
  <?php 
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $ID = $_COOKIE["ID"];

    $conn = mysqli_connect("localhost", "root","","COMP3421");
    $sql = "SELECT Q.QuizID AS QID, Q.name AS Qname, C.name AS Cname FROM Quiz AS Q , ClassName AS C WHERE Q.ClassID = C.ClassID AND C.TeacherID = $ID";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows != 0) {
      while($row = mysqli_fetch_assoc($result))
      {
      $quizID=$row['QID'];
      $quizName=$row['Qname'];
      $className=$row['Cname'];
      echo "<Tr>
              <td>$quizID</td>
              <td>$quizName</td>
              <td>$className</td>
            <tr>";
      }
    }
    else {
      echo "<script> alert('No quiz is created. Back to main page.') 
        document.location='main_t.html'</script>";
    }
  ?>  
</table>

<br>
<h1> Change Class</h1>
<form action="classnamechange.php" method="post">
    <label for="ID">QuizID:</label><br>

    <select name="QuizID" id="QuizID">
      <?php
      
        $sql = "SELECT QuizID FROM Quiz WHERE TeacherID = $ID";
        $result = mysqli_query($conn, $sql);
        while($row = $result->fetch_assoc()) {
          $quizID = $row['QuizID']
          echo "<option value='$quizID'>$quizID</option>"
        }
        
      ?>
    </select>
    
    <label for="pw">New Class Name:</label><br>
    <input type="text" id="newname" name="newname" value=""><br>
    <input type="submit" value="Submit">
</form>

<h1> Change QuizName</h1>
<form action="classnamechange.php" method="post">
    <label for="ID">Class ID of the class to change:</label><br>
    <input type="text" id="ClassID" name="ClassID" value=""><br>
    <label for="pw">New Class Name:</label><br>
    <input type="text" id="newname" name="newname" value=""><br>
    <input type="submit" value="Submit">
</form>

  <a id="journey" class="tbhover tbcontent" href="main_t.html">Back to main page</a>!
</body>
</html>

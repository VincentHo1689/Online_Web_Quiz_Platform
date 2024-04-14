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
          <th>Student Name</th>
          <th>Class Name</th>
          <th>Score</th>
          <th>Total Score</th>
        </tr>
        <?php 
      
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
      
        $TeacherID = $_COOKIE["ID"];

        $conn = mysqli_connect("localhost", "root","","COMP3421");


        $sql = "SELECT S.username AS sname, CN.name AS cname, S.ID AS SID
                FROM Class AS C, Student AS S, ClassName AS CN
                WHERE C.ClassID = CN.ClassID
                  AND C.StudentID = S.ID
                  AND CN.TeacherID = $TeacherID
                  AND CN.ClassID <> 0";; 

        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
          $SName=$row['sname'];
          $CName=$row['cname'];
          $SID = $row['SID']
          ?> <tr>
              <td><?php echo $SName ?></td>
              <td><?php echo $CName ?></td> 
          <?php 

          $sql2 = "SELECT SUM(S.Correct) AS Score, COUNT(S.Correct) AS Total
                    FROM Stat AS S 
                    WHERE StudentID = $SID";

          $result2 = mysqli_query($conn, $sql2);
          $row = $result2 -> fetch_assoc();
          $Score = $row['Score'];
          $Total = $row['Total'];
          ?> 
              <td><?php echo $Score ?></td> 
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

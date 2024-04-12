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
      <th>Quiz ID</th>
      <th>Quiz Name</th>
    </tr>
    <?php 
  
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
  
    $ID = $_COOKIE["ID"];
  
    $conn = mysqli_connect("localhost", "root","","COMP3421");
    $sql = "SELECT QuizID, name FROM Quiz WHERE ClassID = 0 OR ClassID = ANY(SELECT ClassID FROM Class Where StudentID = '$ID')";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
    $QID=$row['QuizID'];
    $quizname=$row['name'];
    echo "<Tr>
            <td>$QID</td>
            <script>
            (function() {
              var scrt_var = '$quizname';
              var strLink = '2.html&Key=' + scrt_var;
              document.getElementById('link').setAttribute('href',strLink);
          })();
            </script>
            <td><a  id='link'>$quizname</a></td>
          <tr>";
    }
    ?>  
  </table>

  <a id="journey" class="tbhover tbcontent" href="main_s.html">Back to main page</a>!
</body>
</html>

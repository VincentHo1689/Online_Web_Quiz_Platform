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
<?php 
  
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
  
    $name = $_POST["QuizName"];
    echo $name;
    
?>
  <table>
    <Tr>
      <th>Quiz Name</th>
      <th>Class Name</th>
    </tr>
    
    
 
  </table>

  <a id="journey" class="tbhover tbcontent" href="main_s.html">Back to main page</a>!
</body>
</html>

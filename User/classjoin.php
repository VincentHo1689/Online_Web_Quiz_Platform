<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../function/style.css">
  <script src="../function/script.js"></script>
  <title>Create Class</title>
  <link rel="icon" href="">
</head>
<body class="users">
  <br>
  <div class="bg-rectphp">
    <h3> Existing Class </h3>
    <table style="margin-left: auto; margin-right: auto; font-size: " >
        <Tr>
          <th>Class ID</th>
          <th>Class Name</th>
        </tr>
        <?php 
      
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
      
        $conn = mysqli_connect("localhost", "root","","COMP3421");
        $sql = "SELECT ClassID, name FROM ClassName WHERE ClassID <> 0";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
        $classID=$row['ClassID'];
        $className=$row['name'];
        echo "<Tr>
                <td>$classID</td>
                <td>$className</td>
              <tr>";
        }
        ?>  
      </table>
      </div>
      <br>
      <div class="bg-rectphp">
<h1> Join class </h1>
<form action="studentjoin.php" method="post" >
    <label for="ID">Input ID of the class to join:</label><br>
    <input type="text" id="ID" name="ID" value=""><br><br>
    <input type="submit" value="Submit"> <br><br>
      </div>
      <a><button style="margin-top: 5%" class="rect-arrowhome" onclick="window.location.href='main_s.html'"> <h4 style="font-size: 2vh;">Back to main page!</h4></button></a>
</body>
</html>

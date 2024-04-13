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
<body class="users">
<div class="bg-rectphp">
<h2>Existing Classes</h2>




<table style="font-size: 3vh;" class="centered">
  <Tr>
    <th>Class ID</th>
    <th>Class Name</th>
  </tr>
  <?php 

  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
  error_reporting(E_ALL);

  $ID = $_COOKIE["ID"];

  $conn = mysqli_connect("localhost", "root","","COMP3421");
  $sql = "SELECT ClassID, name FROM ClassName WHERE TeacherID = $ID AND ClassID <> 0";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result))
  {
  $classID=$row['ClassID'];
  $className=$row['name'];
  echo "<tr>
          <td>$classID</td>
          <td>$className</td>
        <tr>";
  }
  ?>  
 
</table>
 </div>
<br>
<div class="bg-rectphp">
<h2> Change Class Name </h2>
<form action="classnamechange.php" method="post" style="font-size: 2.6vh;">
    <label for="ID">Class ID of the class to change:</label><br>
    <input type="text" id="ID" name="ID" value=""><br>
    <label for="pw">New Class Name:</label><br>
    <input type="text" id="newname" name="newname" value=""><br><br>
    <input type="submit" value="Submit"><br><br>
</form>
</div>

<button style="margin-top: 1%;" class="rect-arrowhome" onclick="window.location.href='main_t.html'"> <h4 style="font-size: 2vh;">Back to main page</h4></button>
</body>
</html>

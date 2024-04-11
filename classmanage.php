<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <title>Manage Class</title>
  <link rel="icon" href="">
</head>
<body>

<h1>Existing Classes</h1>




<table>
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
  echo "<Tr>
          <td>$classID</td>
          <td>$className</td>
        <tr>";
  }
  ?>  
</table>

<br>
<p> Change Class Name </p>
<form action="classnamechange.php" method="post">
    <label for="ID">Class ID of the class to change:</label><br>
    <input type="text" id="ID" name="ID" value=""><br>
    <label for="pw">New Class Name:</label><br>
    <input type="text" id="newname" name="newname" value=""><br>
    <input type="submit" value="Submit">
</form>
  <a id="journey" class="tbhover tbcontent" href="main_t.html">Back to main page</a>!
</body>
</html>

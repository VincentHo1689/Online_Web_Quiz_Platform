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

<h1>Existing Class</h1>




<table>
  <Tr>
    <th>Class ID</th>
    <th>Class Name</th>
  </tr>
  <?php 


  $sql = "SELECT ClassID, name FROM ClassName WHERE TeacherID = $ID";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result))
  {
  ?>
      <Tr>
        <td><?=$row['ClassID']?><td>
        <td><?=$row['name']?><td>
      <tr>
  <?php
  }
  ?>  
</table>


  <table>
    <tr>
      <th>Class ID</th>
      <th>Class Name</th>
    </tr>
  </table>

  <a id="journey" class="tbhover tbcontent" href="main_t.html">Back to main page</a>!
</body>
</html>

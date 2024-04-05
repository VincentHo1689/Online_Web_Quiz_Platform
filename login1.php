<?php
    echo "Connecting PHP"."<br>";
    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    echo "Runnung PHP"."<br>";
    $name = $_POST['username'];
    echo "Assign variable ".$name."<br>";

    $sql = "INSERT INTO `test` VALUES ('".$name."')";
    mysqli_query($conn, $sql);

    echo "Running sql INSERT"."<br>";

    $sql = "SELECT test FROM test";
    $result = mysqli_query($conn, $sql);

    echo "Running sql SELECT"."<br>";

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "test: " . $row["test"] . "<br>";
    }
    } else {
    echo "0 results";
}
  
  ?>
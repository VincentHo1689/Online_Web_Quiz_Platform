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

    echo "Running sql"."<br>";

    $result = mysqli_query($conn, $sql);
    echo $result;
  
  ?>
<?php
    echo "Runnung PHP";
    $name = $_POST['username'];
    echo "Assign variable".$name;

    $sql = "INSERT INTO `test` VALUES ('".$name."')";
    mysqli_query($conn, $sql);

    echo "Running sql";

    $result = $conn->query($sql);

    echo $result;
  
  ?>
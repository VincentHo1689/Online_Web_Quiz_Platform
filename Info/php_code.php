<?php

    #connect PHP
    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    # assign variable
    $name = $_POST['username'];

    # run sql - no query
    $sql = "INSERT INTO `test` VALUES ('".$name."')";
    mysqli_query($conn, $sql);

    # run sql - query
    $sql = "SELECT test FROM test";
    $result = mysqli_query($conn, $sql);
    
    # print query
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "test: " . $row["test"] . "<br>";
    }
    } else {
    echo "0 results";
    }

    # print query in table
    ?>
        <table>
        <tr>
            <td>Teacher Name</td>
        </tr>
        <?php 
        while($row = mysqli_fetch_assoc($result))
        {
        ?>
            <tr>
                <td><?=$row['TeacherName']?><td>
            <tr>
        <?php
        }
        ?>  
        </table>
    <?php
    # redirect 1
    echo "<script> 
    alert('Wrong Username!!!') 
    windows.location.href='login.html'</script>";

    # redirect 2
    header("Location: main_g.html");

    # check dulplicate name
    $sql = "SELECT Username FROM $role WHERE Username = '$name'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows != 0) {
        # username wrong/ do not exist
        echo "<script> alert('Username taken, please choose another username.') 
        document.location='login.html'</script>";}

    # append new ID
    $sql = "SELECT MAX(ClassID) AS new_id FROM ClassName";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $new_id = (int) $row["new_id"] +1;

    # get 1 row / check exist
    $sql = "SELECT PW FROM $role WHERE Username = '$name'";
    $result = mysqli_query($conn, $sql); 
    $row = $result->fetch_assoc();
    $pw1 = $row["PW"];
  
  ?>

  # echo in one line
  <?= $var ?>

  console.log(document.cookie)
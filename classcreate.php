<?php

    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $class = $_POST['class'];

    $sql = "SELECT MAX(ClassID) AS new_id FROM ClassName";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $new_id = (int) $row["new_id"] +1;

    # check dulplicate name
    $sql = "SELECT name FROM ClassName WHERE name = '$class'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows != 0) {
        # username wrong/ do not exist
        echo "<script> alert('Class Name taken, please choose another class name.') 
        document.location='classcreate.html'</script>";}

    # check empty  
    if (empty($class)){
        # empty name
        echo "<script> alert('Empty class name.') 
        document.location='classcreate.html'</script>";}
    else{
        echo "<script> 
        alert('Class $class successfully created!')
        </script>";
        $sql = "INSERT INTO ClassName VALUES ('$new_id','$class')";
        mysqli_query($conn, $sql);
        echo "<script> document.location='main_t.html' </script>";
    }
?>
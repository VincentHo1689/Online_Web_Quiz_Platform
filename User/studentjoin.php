<?php

    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $ID = $_POST['ID'];  
    $SID = $_COOKIE["ID"];
    
    $sql = "SELECT * FROM Class WHERE ClassID='$ID' AND StudentID= '$SID'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows != 0) {
        # username wrong/ do not exist
        echo "<script> alert('You already joined this class.') 
        document.location='main_s.html'</script>";}

    if (empty($ID)){
        # empty field
        echo "<script> alert('Some field are not entered!') 
        document.location='classjoin.php'</script>";
    }
    else{
        # successful enter
        $sql = "SELECT name FROM ClassName WHERE ClassID = '$ID' AND ClassID <> 0";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $name = $row['name'];
        echo "<script> 
        alert('Joined Class ' + '$name' +'.');
        </script>";
        $sql = "INSERT INTO Class(ClassID, StudentID) VALUES('$ID','$SID')";
        mysqli_query($conn, $sql);
        echo "<script> document.location='main_s.html' </script>";
    }
?>
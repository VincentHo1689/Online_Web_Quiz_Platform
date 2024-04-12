<?php

    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $ID = $_POST['QuizID'];
    $name = $_POST['Class'];  

    if (empty($name) || empty($ID)){
        # empty field
        echo "<script> alert('Some field are not entered!') 
        document.location='quizmodify.php'</script>";
    }
    else{
        # successful enter
        echo "<script> 
        alert('Class Name Updated.')
        </script>";
        $sql = "UPDATE Quiz SET ClassID = (SELECT ClassID FROM ClassName WHERE name = '$name') WHERE QuizID = $ID;";
        mysqli_query($conn, $sql);
        echo "<script> document.location='quizmodify.php' </script>";
    }
?>
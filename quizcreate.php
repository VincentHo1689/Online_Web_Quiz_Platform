<?php

    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $qname = $_POST['qname'];
    $cid = $_POST['cid'];
    $teacher = $_COOKIE['ID'];

    
    $sql = "SELECT ClassID FROM ClassName WHERE TeacherID = '$teacher'";
    $result = mysqli_query($conn, $sql); 
    $row = $result->fetch_assoc();
    if ($result->num_rows == 0) {
        # username wrong/ do not exist
        echo "<script> alert('ClassID not available.') 
        document.location='login.html'</script>";}

    if (empty($qname) || empty($cid)){
        # empty field
        echo "<script> alert('Some field are not entered!') 
        document.location='quizcreate.html'</script>";
    }
    else{
        # successful enter
        echo "<script> 
        alert('Quiz Name Updated.')
        document.cookie='quizID=$; path=/'
        </script>";
        
        # new ID
        $sql = "SELECT MAX(QuizID) AS new_id FROM Quiz";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $new_id = (int) $row["new_id"] +1;

        $sql = "INSERT INTO Quiz VALUES($new_id,'$qname',$cid,$teacher);";	
        mysqli_query($conn, $sql);
        echo "<script> document.location='quizquestioncreate.html' </script>";
    }
?>
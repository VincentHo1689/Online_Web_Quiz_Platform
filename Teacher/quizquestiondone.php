<?php
    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $Q = $_POST['question'];
    $a1 = $_POST['o1'];
    $a2 = $_POST['o2'];
    $a3 = $_POST['o3'];
    $a4 = $_POST['o4'];
    $a1r = isset($_POST['o1r']);
    if (empty($a1r)){$a1r = 0;}
    $a2r = isset($_POST['o2r']);
    if (empty($a2r)){$a2r = 0;}
    $a3r = isset($_POST['o3r']);
    if (empty($a3r)){$a3r = 0;}
    $a4r = isset($_POST['o4r']);
    if (empty($a4r)){$a4r = 0;}

    $quiz_id = $_COOKIE['quizID'];

    # get id
    $sql = "SELECT MAX(QuestionID) AS new_id FROM Question";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $question_id = (int) $row["new_id"] +1;

    if (empty($Q) || empty($a1) || empty($a2) || empty($a3) || empty($a4)){
        # empty field
        echo "<script> alert('Some field are not entered!') 
        document.location='quizquestioncreate.php'</script>";
    }
    else{
        # successful enter
        echo "<script> alert('Question updated!') </script>";
        $sql = "INSERT INTO Question VALUES ('$question_id', '$quiz_id', '$Q')";
        mysqli_query($conn, $sql);
        $sql = "INSERT INTO Answer VALUES ('$question_id',1 ,'$a1' ,'$a1r')";
        mysqli_query($conn, $sql);
        $sql = "INSERT INTO Answer VALUES ('$question_id',2 ,'$a2' ,'$a2r')";
        mysqli_query($conn, $sql);
        $sql = "INSERT INTO Answer VALUES ('$question_id',3 ,'$a3' ,'$a3r')";
        mysqli_query($conn, $sql);
        $sql = "INSERT INTO Answer VALUES ('$question_id',4 ,'$a4' ,'$a4r')";
        mysqli_query($conn, $sql);
        echo "<script> 
        document.cookie = 'quizID =; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        document.location='main_t.html' </script>";
    }
?>
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
    $a2r = isset($_POST['o2r']);
    $a3r = isset($_POST['o3r']);
    $a4r = isset($_POST['o4r']);

    $quiz_id = $_COOKIE['quizID'];
    echo $quiz_id."<br>";

    echo $Q."<br>";
    echo $a1."<br>";
    echo $a1r."<br>";
    echo $a2."<br>";
    echo $a2r."<br>";
    echo $a3."<br>";
    echo $a3r."<br>";
    echo $a4."<br>";
    echo $a4r."<br>";
    

    # get id
    $sql = "SELECT MAX(QuestionID) AS new_id FROM Question";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $question_id = (int) $row["new_id"] +1;
    echo $a4r."<br>";

    if (empty($Q) || empty($a1) || empty($a2) || empty($a3) || empty($a4)){
        # empty field
        echo "<script> alert('Some field are not entered!') 
        document.location='signup.html'</script>";
    }
    else{
        # successful enter
        echo "<script> 
        alert('Question updated!')
        </script>";
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
        echo "<script> document.location='login.html' </script>";
    }
?>
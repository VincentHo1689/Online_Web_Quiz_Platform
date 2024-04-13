<?php
    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    # Get input 
    $A1r = isset($_POST['A1']);
    if (empty($A1r)){$A1r = 0;}
    $A2r = isset($_POST['A2']);
    if (empty($A2r)){$A2r = 0;}
    $A3r = isset($_POST['A3']);
    if (empty($A3r)){$A3r = 0;}
    $A4r = isset($_POST['A4']);
    if (empty($A4r)){$A4r = 0;}

    # Get Answer
    $QuizID = $_COOKIE['QuizID'];
    $QNum = $_COOKIE['QNum'];
    $sql = "SELECT Content, QuestionID FROM Question WHERE QuizID = '$QuizID' ORDER BY QuestionID";
    $Question = mysqli_query($conn, $sql);
    for ($i = 0; $i < $QNum; $i++) {
        $row = $Question->fetch_assoc();
    }
    $QuestionID = $row['QuestionID'];

    $sql = "SELECT Answer FROM Answer WHERE QuestionID = '$QuestionID' ORDER BY AnswerNum";
    $Answer = mysqli_query($conn, $sql);
    $row = $Answer->fetch_assoc();
    $row = $Answer->fetch_assoc();
    $row = $Answer->fetch_assoc();
    $row = $Answer->fetch_assoc();

    $A1 = $row['Answer'];
    $A2 = $row['Answer'];
    $A3 = $row['Answer'];
    $A4 = $row['Answer'];

    $correct = ($A1r==$A1 && $A2r==$A2 && $A3r==$A3 && $A4r==$A4);
    if (empty($correct)){$correct = 0;}

    # Insert answer
    $SID = $_COOKIE['ID'];
    #$sql = "INSERT INTO Stat VALUES ('$QuestionID','$SID','$correct')";
    #mysqli_query($conn, $sql);
    
    # Check last question
    $sql = "SELECT COUNT(*) AS cnt FROM Question WHERE QuizID = '$QuizID'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $TotalQ = $row['cnt'];
    if ($TotalQ == $QNum){
        echo "<script> document.location='quizend.php'</script>";
    }
    else{
        $Qnum = (int) $QNum +1;
        setcookie('QNum', $Qnum);
        echo "<script> document.location='quiz.php';</script>";
    }


?>




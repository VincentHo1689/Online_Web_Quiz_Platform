<?php
    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $QuizID = $_COOKIE['QuizID'];
    $StudentID = $_COOKIE['ID'];

    $QNum = $_COOKIE['QNum'];
    $sql = "SELECT Content, QuestionID FROM Question WHERE QuizID = '$QuizID' ORDER BY QuestionID";
    $Question = mysqli_query($conn, $sql);
    for ($i = 0; $i < $QNum; $i++) {
        $row = $Question->fetch_assoc();
    }
    $QuestionID = $row['QuestionID'];

    $SID = $_COOKIE['ID'];
    
    # Check last question
    
    $sql = "SELECT COUNT(Correct), SUM(Correct)FROM Stat WHERE QuestionID IN( SELECT QuestionID FROM Question WHERE QuizID = '$QuizID') AND StudentID ='$StudentID';";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    



?>




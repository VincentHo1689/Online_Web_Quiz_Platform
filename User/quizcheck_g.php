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
    #echo 'Question: '.$QuestionID.'<br>';

    $sql = "SELECT Answer FROM Answer WHERE QuestionID = '$QuestionID' ORDER BY AnswerNum";
    $Answer = mysqli_query($conn, $sql);
    $row = $Answer->fetch_assoc();
    $A1 = $row['Answer'];
    $row = $Answer->fetch_assoc();
    $A2 = $row['Answer'];
    $row = $Answer->fetch_assoc();
    $A3 = $row['Answer'];
    $row = $Answer->fetch_assoc();
    $A4 = $row['Answer'];

    # Checking
    #echo 'SQL <br>'.$A1.'<br>'.$A2.'<br>'.$A3.'<br>'.$A4.'<br><br>';
    #echo 'Input <br>'.$A1r.'<br>'.$A2r.'<br>'.$A3r.'<br>'.$A4r.'<br><br>';
    #echo 'Logic <br>'.($A1r==$A1).'<br>'.($A2r==$A2).'<br>'.($A3r==$A3).'<br>'.($A4r==$A4).'<br><br>';
    #echo 'Out <br>'.(($A1r==$A1) && ($A2r==$A2) && ($A3r==$A3) && ($A4r==$A4));
    $correct = (($A1r==$A1) && ($A2r==$A2) && ($A3r==$A3) && ($A4r==$A4));
    if (empty($correct)){$correct = 0;}

    # Insert answer
    $SID = -1;
    $sql = "INSERT INTO Stat VALUES ('$QuestionID','$SID','$correct')";
    mysqli_query($conn, $sql);
    
    # Check last question
    $sql = "SELECT COUNT(*) AS cnt FROM Question WHERE QuizID = '$QuizID'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $TotalQ = $row['cnt'];
    if ($TotalQ <= $QNum){
        echo "<script> document.location='quizend_g.php'</script>";
    }
    else{
        $QNum = (int) $QNum +1;
        setcookie('QNum',$QNum, 0, '/');
        echo "<script> document.location='quiz_g.php';</script>";
    }


?>




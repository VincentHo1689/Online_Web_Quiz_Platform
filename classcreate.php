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

    if (empty($class)){
        # no input radio 
        echo "<script> alert('Empty name.') 
        document.location='classcreate.html'</script>";}

    if ($pw != $cpw){
        # wrong password
        echo "<script> alert('Password not identical!') 
        document.location='signup.html'</script>";}

    if (!(str_contains($email, '@'))) {
        echo "<script> alert('Email is not valid!') 
        document.location='signup.html'</script>";
    }

    if (empty($name) || empty($email) || empty($pw) || empty($cpw)){
        echo "<script> alert('Some field are not entered!') 
        document.location='signup.html'</script>";
    }
    else{
        echo "<script> 
        alert('$role account successfully created! \\n Username = $name \\n Email = $email \\n Password = $pw ')
        </script>";
        $sql = "INSERT INTO $role VALUES ('$new_id','$name','$pw','$email')";
        mysqli_query($conn, $sql);
        echo "<script> document.location='login.html' </script>";
    }
?>
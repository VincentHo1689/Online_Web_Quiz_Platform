<?php

    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    $role = $_POST['login_role'];
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pw = $_POST['pw'];
    $cpw = $_POST['cpw'];

    $sql = "SELECT MAX(StudentID) AS new_id FROM Students";
    $result = mysqli_query($conn, $sql);
    
    $row = $result->fetch_assoc();
    $new_id = (int) $row["new_id"] +1;

    if (empty($role)){
        # no input radio 
        echo "<script> alert('Role not chosen.') 
        document.location='signup.html'</script>";}

    if ($pw != $cpw){
        # wrong password
        echo "<script> alert('Password not identical!') 
        document.location='signup.html'</script>";}

    if (empty($name) || empty($email) || empty($pw)){
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
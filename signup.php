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
    echo $role;

    if (empty($role)){
        # no input radio 
        echo "<script> alert('Role not chosen.') 
        document.location='signup.html'</script>";}

    if ($pw != $cpw){
        # wrong password
        echo "<script> alert('Password not identical!') 
        document.location='signup.html'</script>";}

    if ($role=='Students'){
        echo "<script> 
        alert('Student account successfully created! \\n Username = $name \\n Email = $email \\n Password = $pw ')
        </script>";
        #document.location='login.html'";
    }
  ?>
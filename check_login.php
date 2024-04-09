<?php
    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    

    $role = $_POST['login_role'];
    $name = $_POST['username'];
    $pw = $_POST['pw'];
    
    if (empty($role)){
        # no input radio 
        echo "<script> alert('Role not chosen!!!') 
        document.location='login.html'</script>";}
    else{ 
        $sql = "SELECT PW FROM $role WHERE Username = '$name'";
        $result = mysqli_query($conn, $sql);

        if (!$conn)
        {
            die("Connect Error:" . mysqli_connect_error());
        }

        if ($result->num_rows == 0) {
            # username wrong/ do not exist
            echo "<script> alert('Username wrong or not exist.') 
            document.location='login.html'</script>";}
        else {
            # username exists
            $row = $result->fetch_assoc();
            $pw1 = $row["PW"];
            if ($pw == $pw1){
                #correct password
                echo "<script> alert('Welcome $role ".$name.".') 
                document.location='main_s.html'</script>";
            }
            else {
                #wrong password
                echo "<script> alert('Incorrect password.') 
                document.location='login.html'</script>";
            }
        }
    }
  ?>
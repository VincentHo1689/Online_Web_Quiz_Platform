<?php
    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);


    $role = $_POST['login_role'];
    $name = $_POST['username'];
    $pw = $_POST['pw'];

    $_COOKIE['QNum']='';
    $_COOKIE['QuizID']='';
    
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
                $sql = "SELECT ID FROM $role WHERE Username = '$name'";
                $result = mysqli_query($conn, $sql); 
                $row = $result->fetch_assoc();
                $ID = $row["ID"];
                #correct password
                if ($role == 'Student')
                {echo "<script> 
                    document.cookie='username=$name; path=/'
                    document.cookie='ID=$ID; path=/'
                    alert('Welcome $role ".$name.".') 
                    document.location='../user/main_s.html'</script>";}
                else 
                    {echo "<script> 
                    document.cookie='username=$name; path=/'
                    document.cookie='ID=$ID; path=/'
                    alert('Welcome $role ".$name.".') 
                    document.location='../teacher/main_t.html'</script>";}
            }
            else {
                #wrong password
                echo "<script> alert('Incorrect password.') 
                document.location='login.html'</script>";
            }
        }
    }
  ?>
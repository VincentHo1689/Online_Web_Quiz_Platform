<?php
    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    $role = $_POST['login_role'];
    $name = $_POST['username'];
    $pw = $_POST['pw'];
    
    echo "Test Input: ";
    echo "<br> Role: ".$role;
    echo "<br> Name: ".$name;
    echo "<br> PW: ".$pw;
    echo "<br><br> Result: ";
    

    if (empty($role)){
        # no input radio 
        echo "<script> alert('Choose your role!!!') 
        document.location='login.html'</script>";}
    else if($role=='s'){ 
        $sql = "SELECT PW FROM Students WHERE Username = '$name'";
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
                echo "<script> alert('Welcome student ".$name.".') 
                document.location='main_s.html'</script>";
            }
            else {
                #wrong password
                echo "<script> alert('Incorrect password.') 
                document.location='login.html'</script>";
            }
        }
    }
    else {
        $sql = "SELECT PW FROM Students WHERE Username = '$name'";
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
                echo "<script> alert('Welcome teacher ".$name.".') 
                document.location='main_t.html'</script>";
            }
            else {
                #wrong password
                echo "<script> alert('Incorrect password.') 
                document.location='login.html'</script>";
            }
        }
    }
  ?>
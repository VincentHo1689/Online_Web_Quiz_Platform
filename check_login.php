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
        echo "no input!";}
    else if($role='s'){ 
        $sql = "SELECT PW FROM Students WHERE username = ".$name;
        $result = mysqli_query($conn, $sql);

        if (!$conn)
        {
            die("Connect Error:" . mysqli_connect_error());
        }

        if ($result->num_rows > 0) {
            # username wrong/ do not exist
            echo "x Username";
        }
        else {
            # username exists
            $row = $result->fetch_assoc();
            echo "row = ".$row["PW"];
            $pw1 = $row["PW"];
            if ($pw = $pw1){
                #correct password
                echo "v Username v Password";
            }
            else {
                #wrong password
                echo "v Username x Password";
            }
        }
    }
    else {}
  ?>
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
        echo "no input!";}

    echo empty($role)."<br>";
    echo $role."<br>".$name."<br>".$pw
  ?>
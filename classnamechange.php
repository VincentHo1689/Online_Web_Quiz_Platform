<?php

    $conn = mysqli_connect("localhost", "root","","COMP3421");
    if (!$conn)
    {
        die("Connect Error:" . mysqli_connect_error());
    }

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $ID = $_POST['ID'];
    $name = $_POST['newname'];

    echo $ID;
    echo $name;
    

    if (empty($name) || empty($ID)){
        # empty field
        echo "<script> alert('Some field are not entered!') 
        document.location='classmanage.php'</script>";
    }
    else{
        # successful enter
        echo "<script> 
        alert('Class Name Updated.')
        </script>";
        $sql = "UPDATE CLASSNAME SET name = $name WHERE ClassID = $ID;";
        mysqli_query($conn, $sql);
        echo "<script> document.location='classmanage.php' </script>";
    }
?>
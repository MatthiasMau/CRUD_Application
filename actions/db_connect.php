<?php 
    $hostname = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "crud_application";

    //Create connection 
    $connect = mysqli_connect($hostname, $username, $password, $dbname);

    // check connection
    if($connect->connect_error){
        die("Connection to DB failed " . $connect->connect_error);
    } else {
        echo "Sucessful connection to DB";
    }
?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "chatroom";

    //creating database connection
    $conn = mysqli_connect($servername,$username,$password,$database);

    //connection checking
    if(!$conn){
        die("Failed to connect". mysqli_connect_error());
    }




?>
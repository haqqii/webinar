<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "projectku";

    $conn = mysqli_connect($servername,$username,$password,$db);

    if(!$conn){
        die("error bang");
    }

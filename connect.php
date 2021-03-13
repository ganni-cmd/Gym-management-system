<?php
    $conn = mysqli_connect("localhost", "root", "", "arnoldgym");
    
    if(!$conn){
        echo "Error connecting to the database";
        exit();
    }
return $conn;
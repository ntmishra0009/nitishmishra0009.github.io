<?php

    include('components/validation.php');
    $server='localhost';
    $user='root';
    $pass='';
    $db='contacts';

    $conn = new mysqli($server,$user,$pass,$db);

    if($conn->connect_error)
    {
        die("connection not done".$conn->connect_error);

    }
    session_start();
    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    // else
    // {
    //     echo "connection is successfull";
    // }

    

?>
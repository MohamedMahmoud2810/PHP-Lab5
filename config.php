<?php
$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname ='form';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass , $dbname);
    
    if(! $conn ) {
        die('Could not connect: ' . mysqli_error($conn));
    }

    ?>
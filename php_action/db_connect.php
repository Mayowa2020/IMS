<?php

    // connect to database
    $conn = mysqli_connect('localhost:3308', 'Moyin', 'moyin"happy', 'inventory_management_software');
    
    // check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

?>
<?php

    require_once 'core.php';

    $valid['success'] = array('success' => false, 'messages' => array());

    if($_POST) {
        $vendorName = $_POST['vendorName'];
        $vendorPhoneNumber = $_POST['vendorPhoneNumber'];
        $vendorEmail = $_POST['vendorEmail'];
        $vendorAddress = $_POST['vendorAddress'];

        $sql = "INSERT INTO vendors (vendor_name, phone_number, vendor_email, vendor_address) VALUES ('$vendorName', '$vendorPhoneNumber', '$vendorEmail', '$vendorAddress')";
    
        if($conn->query($sql) === TRUE) {
            $valid['success'] = true;
            $valid['messages'] = 'Successfully Added';
        } else {
            $valid['success'] = false;
            $valid['messages'] = 'Error while adding vendor';
        }

        $conn->close();

        echo json_encode($valid);
    }

?>
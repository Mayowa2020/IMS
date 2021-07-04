<?php

    require_once '../php_action/core.php';

    $valid['success'] = array('success' => false, 'messages' => array());

    if($_POST) {
        $customerName = $_POST['customerName'];
        $customerPhoneNumber = $_POST['customerPhoneNumber'];
        $customerEmail = $_POST['customerEmail'];
  
        $sql = "INSERT INTO customers (customer_name, phone_number, customer_email)
        VALUES ('$customerName', '$customerPhoneNumber', '$customerEmail')";
    
        if($conn->query($sql) === TRUE) {
            header('location: customers.php');
            // $valid['success'] = true;
            // $valid['messages'] = 'Successfully Added';
        } else {
            $valid['success'] = false;
            $valid['messages'] = 'Error while adding cuatomer';
        }

   
        echo json_encode($valid);
    }
?>

<?php require_once '../includes/header.php'; ?>

    <div class='addcustomer'>
        <span class='heading'>
            <img src='../Images/customers.png' alt='customers icon' />
            <h3> Create New Customer</h3>
        </span>
        <form class='customer-form' action='addcustomer.php' method='POST'>
            <div>
                <label for='customerName'>Customer Name</label>
                <input type='text' id='customerName' name='customerName' />
            </div>

            <div>
                <label for='customerPhoneNumber'>Phone Number</label>
                <input type='tel' name='customerPhoneNumber' id='customerPhoneNumber' />
            </div>

            <div>
                <label for='customerEmail'>Email</label>
                <input type='email' name='customerEmail' id='customerEmail' />
            </div>
         
            <div class='add-action-btn'>
                <button type='submit'>Save</button>
                <a href='customers.php'>Cancel</a>
            </div>
        </form>
    </div>

<?php require_once '../includes/footer.php'; ?>
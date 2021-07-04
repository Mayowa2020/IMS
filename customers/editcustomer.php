<?php
    require_once '../php_action/db_connect.php';

    // edit selected record
    if($_POST) {
        $customerName = $_POST['customerName'];
        $customerPhoneNumber = $_POST['customerPhoneNumber'];
        $customerEmail = $_POST['customerEmail'];
        $customerId = $_POST['customerId'];

        $sql = "UPDATE customers SET customer_name = '$customerName', phone_number = '$customerPhoneNumber', customer_email = '$customerEmail' WHERE id = '$customerId'";

        if(mysqli_query($conn, $sql)) {
            // success
            header('location: customers.php');
        } {
            // failure
            echo 'query error: ' . mysqli_error($conn);
        }
    }

   
    // check GET request id param
    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // make sql
        $sql = "SELECT * FROM customers WHERE id = $id";

        // get the query result
        $result = mysqli_query($conn, $sql);

        // fetch result in array format
        $customer = mysqli_fetch_assoc($result);

        // free result from memory
        mysqli_free_result($result);

        // close connection
        mysqli_close($conn);

        // print_r($vendor);

    }

?>

<?php require_once '../includes/header.php'; ?>

    <div class='addcustomer'>
        <span class='heading'>
            <img src='../Images/customers.png' alt='customers icon' />
            <h3> Edit Customer Details</h3>
        </span>
        <?php if($customer): ?>
            <form class='customer-form' action='<?php echo $_SERVER['PHP_SELF'] ?>' method='POST'>
                <div>
                    <label for='customerName'>Customer Name</label>
                    <input type='text' id='customerName' name='customerName' value=<?php echo htmlspecialchars($vendor['customer_name']); ?> />
                </div>

                <div>
                    <label for='customerPhoneNumber'>Phone Number</label>
                    <input type='text' name='customerPhoneNumber' id='customerPhoneNumber' value=<?php echo htmlspecialchars($vendor['phone_number']); ?> />
                </div>

                <div>
                    <label for='customerEmail'>Email</label>
                    <input type='email' name='customerEmail' id='customerEmail' value=<?php echo htmlspecialchars($vendor['customer_email']); ?> />
                </div>

                <input type='hidden' name='customerId' value=<?php echo htmlspecialchars($customer['id']); ?> />

                <div class='add-action-btn'>
                    <button type='submit'>Save</button>
                    <a href='customers.php'>Cancel</a>
                </div>
            </form>

        <?php else: ?>
        
            <h2>Oops!! There is no customer with this id</h2>

        <?php endif; ?>

    </div>
    

<?php require_once '../includes/footer.php'; ?>
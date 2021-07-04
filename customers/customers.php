<?php
    require_once '../php_action/db_connect.php';

    // delete selected vendor
    if(isset($_POST['delete'])) {
        $id_to_delete = $_POST['id_to_delete'];
        // $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM customers WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)) {
            // success
            header('location: customers.php');

        } {
            // failure
            echo 'query error: ' . mysqli_error($conn);
        }
    }

    // query for all vendors
    $sql = 'SELECT * FROM customers';

    // make query and get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free result from memory
    mysqli_free_result($result);
?>

<?php require_once '../includes/header.php'; ?>

    <div class='category-header'>
        <span class='heading'>
            <img src='../Images/customers.png' alt='customers icon' />
            <h2>Customers</h2>
        </span>
        <a href='addcustomer.php'>
            <button><i class="fa fa-plus" aria-hidden="true"></i> New Customer</button>
        </a>
    </div>
    
    <div class='field'>
        <form class='field-form'>
            <input type='search' placeholder='Search for customer' />
            <button type='submit' class='filter-btn'>Filter</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Customer Name</th>
                    <th>Registration Date</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($customers as $customer) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($customer['id']); ?></td>
                        <td><?php echo htmlspecialchars($customer['customer_name']); ?></td>
                        <td><?php echo htmlspecialchars($customer['created_at']); ?></td>
                        <td><?php echo htmlspecialchars($customer['customer_email']); ?></td>
                        <td><?php echo htmlspecialchars($customer['phone_number']); ?></td>
                        <td>
                            <a href="editcustomer.php?id=<?php echo $customer['id']; ?>"><button>Edit <i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                            <!-- DELETE FORM -->
                            <form action="customers.php" method="POST">
                                <input type='hidden' name='id_to_delete' value="<?php echo $customer['id']; ?>">
                                <button type='submit' name='delete' class='del-btn'><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            <tbody>
                  
        </table>
    </div>

<?php require_once '../includes/footer.php'; ?>
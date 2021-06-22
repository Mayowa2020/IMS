<?php
    require_once 'php_action/db_connect.php';

    // delete selected inventory
    if(isset($_POST['delete'])) {
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM inventories WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)) {
            // success
            header('location: inventories.php');

        } {
            // failure
            echo 'query error: ' . mysqli_error($conn);
        }
    }

    // query for all purchases
    $sql = 'SELECT * FROM purchases';

    // make query and get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $purchases = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

?>

<?php require_once 'includes/header.php'; ?>

<a href='addpurchase.php'><button> Add Purchase</button></a>

<table>
    <thead>
        <tr>
            <th>S/N</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Vendor</th>
            <th>Created at</th>
            <th>Created by</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($purchases as $purchase) { ?>
            <tr>
                <td><?php echo htmlspecialchars($purchase['id']); ?></td>
                <td><?php echo htmlspecialchars($purchase['inventory_id']); ?></td>
                <td><?php echo htmlspecialchars($purchase['purchase_price']); ?></td>
                <td><?php echo htmlspecialchars($purchase['quantity_purchased']); ?></td>
                <td><?php echo htmlspecialchars($purchase['vendor_id']); ?></td>
                <td><?php echo htmlspecialchars($purchase['created_at']); ?></td>
                <td><?php echo htmlspecialchars($purchase['user_id']); ?></td>
            </tr>
        <?php } ?>
    <tbody>
</table>


<?php require_once 'includes/footer.php'; ?>
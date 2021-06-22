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

    // query for all inventories
    $sql = 'SELECT * FROM inventories';

    // make query and get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $inventories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

?>

<?php require_once 'includes/header.php'; ?>

<a href='addinventory.php'><button> Add Inventory</button></a>

<table>
    <thead>
        <tr>
            <th>S/N</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Created by</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($inventories as $inventory) { ?>
            <tr>
                <td><?php echo htmlspecialchars($inventory['id']); ?></td>
                <td><?php echo htmlspecialchars($inventory['product_name']); ?></td>
                <td><?php echo htmlspecialchars($inventory['category_id']); ?></td>
                <td><?php echo htmlspecialchars($inventory['product_quantity']); ?></td>
                <td><?php echo htmlspecialchars($inventory['stock_status']); ?></td>
                <td><?php echo htmlspecialchars($inventory['created_at']); ?></td>
                <td><?php echo htmlspecialchars($inventory['user_id']); ?></td>
            </tr>
        <?php } ?>
    <tbody>
</table>


<?php require_once 'includes/footer.php'; ?>
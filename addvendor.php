<?php require_once 'includes/header.php'; ?>

<form action='php_action/createBrand.php' method='POST'>
    <label for='vendorName'>Vendor Name</label>
    <input type='text' name='vendorName' id='vendorName' />
    <br /><br />
    <label for='vendorPhoneNumber'>Vendor Phone Number</label>
    <input type='text' name='vendorPhoneNumber' id='vendorPhoneNumber' />
    <br /><br />
    <label for='vendorEmail'>Vendor Email</label>
    <input type='email' name='vendorEmail' id='vendorEmail' />
    <br /><br />
    <label for='vendorAddress'>Vendor Address</label>
    <input type='text' name='vendorAddress' id='vendorAddress' />
    <br /><br />
    <button type='submit'> Submit</button>

</form>


<?php require_once 'includes/footer.php'; ?>
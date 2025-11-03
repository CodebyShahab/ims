<?php require APPROOT . '/views/header.php'; ?>

<a href="<?php echo 'URLROOT'; ?>/" class="btn">Back</a>

<h2>Add Stock Adjustment</h2>
<p>Create a new stock adjustment with this form</p>
<form action="<?php echo 'URLROOT'; ?>/stock_adjustments/add" method="post">
    <div>
        <label for="product_id">Product ID: </label>
        <input type="text" name="product_id" value="<?php echo $data['product_id']; ?>">
    </div>
    <div>
        <label for="quantity">Quantity: </label>
        <input type="text" name="quantity" value="<?php echo $data['quantity']; ?>">
    </div>
    <div>
        <label for="reason">Reason: </label>
        <input type="text" name="reason" value="<?php echo $data['reason']; ?>">
    </div>

    <input type="submit" value="Submit">
</form>

<?php require APPROOT . '/views/footer.php'; ?>
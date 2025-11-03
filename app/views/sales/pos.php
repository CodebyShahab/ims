<?php require APPROOT . '/views/header.php'; ?>

<h1>Point of Sale</h1>

<div class="pos-container">
    <div class="pos-products">
        <h2>Products</h2>
        <!-- Product search and list will go here -->
    </div>
    <div class="pos-cart">
        <h2>Cart</h2>
        <form action="<?php echo 'URLROOT'; ?>/sales/add" method="post">
            <div class="cart-items">
                <!-- Cart items will be added dynamically here -->
            </div>
            <div class="cart-summary">
                <div>
                    <label for="customer_id">Customer: </label>
                    <input type="text" name="customer_id">
                </div>
                <div>
                    <label for="discount">Discount: </label>
                    <input type="text" name="discount">
                </div>
                <div>
                    <label for="payment_method">Payment Method: </label>
                    <input type="text" name="payment_method">
                </div>
                <div>
                    <label for="total">Total: </label>
                    <input type="text" name="total" readonly>
                </div>
            </div>
            <input type="submit" value="Complete Sale">
        </form>
    </div>
</div>

<?php require APPROOT . '/views/footer.php'; ?>
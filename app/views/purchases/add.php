<?php require APPROOT . '/views/header.php'; ?>

<a href="<?php echo 'URLROOT'; ?>/purchases" class="btn">Back</a>

<h2>Add Purchase</h2>
<p>Create a new purchase order with this form</p>
<form action="<?php echo 'URLROOT'; ?>/purchases/add" method="post">
    <div>
        <label for="supplier_id">Supplier: </label>
        <input type="text" name="supplier_id" value="<?php echo $data['supplier_id']; ?>">
    </div>

    <h3>Products</h3>
    <div id="products">
        <div class="product">
            <label for="products[0][id]">Product ID: </label>
            <input type="text" name="products[0][id]">
            <label for="products[0][quantity]">Quantity: </label>
            <input type="text" name="products[0][quantity]">
            <label for="products[0][cost_price]">Cost Price: </label>
            <input type="text" name="products[0][cost_price]">
        </div>
    </div>
    <button type="button" id="add-product">Add Product</button>

    <input type="submit" value="Submit">
</form>

<script>
    document.getElementById('add-product').addEventListener('click', function() {
        var productsDiv = document.getElementById('products');
        var productCount = productsDiv.getElementsByClassName('product').length;
        var newProduct = document.createElement('div');
        newProduct.className = 'product';
        newProduct.innerHTML = `
            <label for="products[${productCount}][id]">Product ID: </label>
            <input type="text" name="products[${productCount}][id]">
            <label for="products[${productCount}][quantity]">Quantity: </label>
            <input type="text" name="products[${productCount}][quantity]">
            <label for="products[${productCount}][cost_price]">Cost Price: </label>
            <input type="text" name="products[${productCount}][cost_price]">
        `;
        productsDiv.appendChild(newProduct);
    });
</script>

<?php require APPROOT . '/views/footer.php'; ?>
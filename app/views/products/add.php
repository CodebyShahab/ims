<?php require APPROOT . '/views/header.php'; ?>

<a href="<?php echo 'URLROOT'; ?>/products" class="btn">Back</a>

<h2>Add Product</h2>
<p>Create a new product with this form</p>
<form action="<?php echo 'URLROOT'; ?>/products/add" method="post">
    <div>
        <label for="name">Name: <sup>*</sup></label>
        <input type="text" name="name" value="<?php echo $data['name']; ?>">
        <span><?php echo $data['name_err']; ?></span>
    </div>
    <div>
        <label for="sku">SKU: <sup>*</sup></label>
        <input type="text" name="sku" value="<?php echo $data['sku']; ?>">
        <span><?php echo $data['sku_err']; ?></span>
    </div>
    <div>
        <label for="description">Description: </label>
        <textarea name="description"><?php echo $data['description']; ?></textarea>
    </div>
    <div>
        <label for="category_id">Category: </label>
        <input type="text" name="category_id" value="<?php echo $data['category_id']; ?>">
    </div>
    <div>
        <label for="brand_id">Brand: </label>
        <input type="text" name="brand_id" value="<?php echo $data['brand_id']; ?>">
    </div>
    <div>
        <label for="default_sale_price">Default Sale Price: </label>
        <input type="text" name="default_sale_price" value="<?php echo $data['default_sale_price']; ?>">
    </div>
    <div>
        <label for="unit">Unit: </label>
        <input type="text" name="unit" value="<?php echo $data['unit']; ?>">
    </div>
    <div>
        <label for="low_stock_alert_level">Low Stock Alert Level: </label>
        <input type="text" name="low_stock_alert_level" value="<?php echo $data['low_stock_alert_level']; ?>">
    </div>
    <div>
        <label for="location">Location: </label>
        <input type="text" name="location" value="<?php echo $data['location']; ?>">
    </div>
    <input type="submit" value="Submit">
</form>

<?php require APPROOT . '/views/footer.php'; ?>
<?php require APPROOT . '/views/header.php'; ?>

<h1>Products</h1>

<a href="<?php echo 'URLROOT'; ?>/products/add" class="btn">Add Product</a>

<table>
    <thead>
        <tr>
            <th>SKU</th>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Average Cost Price</th>
            <th>Default Sale Price</th>
            <th>Unit</th>
            <th>Current Stock</th>
            <th>Low Stock Alert Level</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['products'] as $product) : ?>
            <tr>
                <td><?php echo $product->sku; ?></td>
                <td><?php echo $product->name; ?></td>
                <td><?php echo $product->description; ?></td>
                <td><?php echo $product->category_id; ?></td>
                <td><?php echo $product->brand_id; ?></td>
                <td><?php echo $product->average_cost_price; ?></td>
                <td><?php echo $product->default_sale_price; ?></td>
                <td><?php echo $product->unit; ?></td>
                <td><?php echo $product->current_stock; ?></td>
                <td><?php echo $product->low_stock_alert_level; ?></td>
                <td><?php echo $product->location; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require APPROOT . '/views/footer.php'; ?>
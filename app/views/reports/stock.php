<?php require APPROOT . '/views/header.php'; ?>

<h1>Stock Report</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>SKU</th>
            <th>Current Stock</th>
            <th>Average Cost Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['stock'] as $item) : ?>
            <tr>
                <td><?php echo $item->name; ?></td>
                <td><?php echo $item->sku; ?></td>
                <td><?php echo $item->current_stock; ?></td>
                <td><?php echo $item->average_cost_price; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require APPROOT . '/views/footer.php'; ?>
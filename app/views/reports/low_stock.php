<?php require APPROOT . '/views/header.php'; ?>

<h1>Low Stock Report</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>SKU</th>
            <th>Current Stock</th>
            <th>Low Stock Alert Level</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['lowStock'] as $item) : ?>
            <tr>
                <td><?php echo $item->name; ?></td>
                <td><?php echo $item->sku; ?></td>
                <td><?php echo $item->current_stock; ?></td>
                <td><?php echo $item->low_stock_alert_level; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require APPROOT . '/views/footer.php'; ?>
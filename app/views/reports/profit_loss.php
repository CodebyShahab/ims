<?php require APPROOT . '/views/header.php'; ?>

<h1>Profit & Loss Statement</h1>

<form action="<?php echo 'URLROOT'; ?>/reports/profitLoss" method="post">
    <div>
        <label for="start_date">Start Date: </label>
        <input type="date" name="start_date" value="<?php echo $data['start_date']; ?>">
    </div>
    <div>
        <label for="end_date">End Date: </label>
        <input type="date" name="end_date" value="<?php echo $data['end_date']; ?>">
    </div>
    <input type="submit" value="Generate Report">
</form>

<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Total Quantity Sold</th>
            <th>Total Revenue</th>
            <th>Total Cost</th>
            <th>Profit</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['profitLoss'] as $item) : ?>
            <tr>
                <td><?php echo $item->name; ?></td>
                <td><?php echo $item->total_quantity_sold; ?></td>
                <td><?php echo $item->total_revenue; ?></td>
                <td><?php echo $item->total_cost; ?></td>
                <td><?php echo $item->profit; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require APPROOT . '/views/footer.php'; ?>
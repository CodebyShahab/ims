<?php require APPROOT . '/views/header.php'; ?>

<h1>Sales Report</h1>

<form action="<?php echo 'URLROOT'; ?>/reports/sales" method="post">
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
            <th>ID</th>
            <th>Customer ID</th>
            <th>Total</th>
            <th>Discount</th>
            <th>Payment Method</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['sales'] as $sale) : ?>
            <tr>
                <td><?php echo $sale->id; ?></td>
                <td><?php echo $sale->customer_id; ?></td>
                <td><?php echo $sale->total; ?></td>
                <td><?php echo $sale->discount; ?></td>
                <td><?php echo $sale->payment_method; ?></td>
                <td><?php echo $sale->created_at; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require APPROOT . '/views/footer.php'; ?>
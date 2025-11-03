<?php require APPROOT . '/views/header.php'; ?>

<h1>Purchases Report</h1>

<form action="<?php echo 'URLROOT'; ?>/reports/purchases" method="post">
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
            <th>Supplier ID</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['purchases'] as $purchase) : ?>
            <tr>
                <td><?php echo $purchase->id; ?></td>
                <td><?php echo $purchase->supplier_id; ?></td>
                <td><?php echo $purchase->status; ?></td>
                <td><?php echo $purchase->created_at; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require APPROOT . '/views/footer.php'; ?>
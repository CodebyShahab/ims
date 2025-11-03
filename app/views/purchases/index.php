<?php require APPROOT . '/views/header.php'; ?>

<h1>Purchases</h1>

<a href="<?php echo 'URLROOT'; ?>/purchases/add" class="btn">Add Purchase</a>

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
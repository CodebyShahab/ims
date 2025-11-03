<?php require APPROOT . '/views/header.php'; ?>

<h1>Suppliers</h1>

<a href="<?php echo 'URLROOT'; ?>/suppliers/add" class="btn">Add Supplier</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact Details</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['suppliers'] as $supplier) : ?>
            <tr>
                <td><?php echo $supplier->id; ?></td>
                <td><?php echo $supplier->name; ?></td>
                <td><?php echo $supplier->contact_details; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require APPROOT . '/views/footer.php'; ?>
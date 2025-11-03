<?php require APPROOT . '/views/header.php'; ?>

<h1>Customers</h1>

<a href="<?php echo 'URLROOT'; ?>/customers/add" class="btn">Add Customer</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact Details</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['customers'] as $customer) : ?>
            <tr>
                <td><?php echo $customer->id; ?></td>
                <td><?php echo $customer->name; ?></td>
                <td><?php echo $customer->contact_details; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require APPROOT . '/views/footer.php'; ?>
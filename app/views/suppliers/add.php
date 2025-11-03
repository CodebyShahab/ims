<?php require APPROOT . '/views/header.php'; ?>

<a href="<?php echo 'URLROOT'; ?>/suppliers" class="btn">Back</a>

<h2>Add Supplier</h2>
<p>Create a new supplier with this form</p>
<form action="<?php echo 'URLROOT'; ?>/suppliers/add" method="post">
    <div>
        <label for="name">Name: </label>
        <input type="text" name="name" value="<?php echo $data['name']; ?>">
    </div>
    <div>
        <label for="contact_details">Contact Details: </label>
        <textarea name="contact_details"><?php echo $data['contact_details']; ?></textarea>
    </div>

    <input type="submit" value="Submit">
</form>

<?php require APPROOT . '/views/footer.php'; ?>
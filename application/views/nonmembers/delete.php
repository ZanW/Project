
<head>
    <title>Non-Member Update</title>
</head>


<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('nonmembers/delete'); ?>
<?php foreach ($nonmembers as $nonmember_item): ?>

    ID:<br>
    <input type="input" name="id" value="<?php echo $id;?>" readonly /><br>

    First name:<br>
    <input type="input" name="first_name" value="<?php echo $nonmember_item['first_name'];?>" readonly/><br>

    Last name:<br>
    <input type="input" name="last_name" value="<?php echo $nonmember_item['last_name'];?>" readonly /><br>

    Email:<br>
    <input type="input" name="email" value="<?php echo $nonmember_item['email'];?>" readonly /><br><br>

<?php endforeach; ?>

<input type="submit" name="submit" value="Delele Non-Member" />

</form>


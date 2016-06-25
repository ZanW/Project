<!DOCTYPE html>
<html>
<head>
    <title>Non-Member Update</title>
</head>
<body>
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('nonmembers/update'); ?>
<?php foreach ($nonmembers as $nonmember_item): ?>

ID:<br>
<input type="input" name="id" value="<?php echo $id;?>" readonly /><br>

First name:<br>
<input type="input" name="first_name" value="<?php echo $nonmember_item['first_name'];?>" /><br>

Last name:<br>
<input type="input" name="last_name" value="<?php echo $nonmember_item['last_name'];?>" /><br>

Email:<br>
<input type="input" name="email" value="<?php echo $nonmember_item['email'];?>" /><br><br>

<?php endforeach; ?>

<input type="submit" name="submit" value="Update Non-Member" />



</form>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Member Update</title>
</head>
<body>
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('members/delete'); ?>
<?php foreach ($members as $member_item): ?>

    ID:<br>
    <input type="input" name="id" value="<?php echo $id;?>" readonly /><br>

    First name:<br>
    <input type="input" name="first_name" value="<?php echo $member_item['first_name'];?>" readonly/><br>

    Last name:<br>
    <input type="input" name="last_name" value="<?php echo $member_item['last_name'];?>" readonly /><br>

    Email:<br>
    <input type="input" name="email" value="<?php echo $member_item['email'];?>" readonly /><br><br>

<?php endforeach; ?>

<input type="submit" name="submit" value="Delele Member" />

</form>
</body>
</html>
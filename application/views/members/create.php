<!DOCTYPE html>
<html>
<head>
    <title>Member Create</title>
</head>
<body>
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('members/create'); ?>
    First name:<br>
    <input type="input" name="first_name" /><br>

    Last name:<br>
    <input type="input" name="last_name"/><br>

    Email:<br>
    <input type="input" name="email"/><br><br>

    <input type="submit" name="submit" value="Create Member" />

</form>

</body>
</html>
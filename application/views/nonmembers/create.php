
<head>
    <title>Non-Member Create</title>
</head>

<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('nonmembers/create'); ?>
First name:<br>
<input type="input" name="first_name" /><br>

Last name:<br>
<input type="input" name="last_name"/><br>

Email:<br>
<input type="input" name="email"/><br><br>

<input type="submit" name="submit" value="Create Nonmember" />

</form>


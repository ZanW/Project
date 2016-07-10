
<head>
    <title>Member Update</title>
</head>

<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('members/update'); ?>
<?php foreach ($members as $member_item): ?>

    ID:<br>
    <input type="input" name="id" value="<?php echo $id;?>" readonly /><br>

    First name:<br>
    <input type="input" name="first_name" value="<?php echo $member_item['first_name'];?>" /><br>

    Last name:<br>
    <input type="input" name="last_name" value="<?php echo $member_item['last_name'];?>" /><br>

    Email:<br>
    <input type="input" name="email" value="<?php echo $member_item['email'];?>" /><br><br>

<?php endforeach; ?>

<input type="submit" name="submit" value="Update Member" />

</form>


<head>
    <title>Member Update</title>
</head>

<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('members/update'); ?>
<?php foreach ($members as $member_item): ?>

    <input type="hidden" name="id" value="<?php echo $member_item['ID'];?>" />

    ID: <?php echo $id;?><br><br>

    First Name: <?php echo $member_item['FirstName'];?><br><br>

    Last Name: <?php echo $member_item['LastName'];?><br><br>

    Email: <?php echo $member_item['Email'];?><br><br>

    Status:
    <select name = 'status' >
       <option value="0">Active</option>
       <option value="1">Inactive</option>
       <option value="2">Suspended</option>
    </select><br><br>

<?php endforeach; ?>

<input type="submit" name="submit" value="Update Member" class="btn btn-success"/>

</form>

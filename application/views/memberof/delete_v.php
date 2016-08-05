
<head>
    <title>Delete MemberOf</title>
</head>


<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('memberof_c/delete_memberof'); ?>

<?php foreach ($memberoflist as $memberof_item): ?>

    Group ID:<br>
    <input type="input" name="gid" value="<?php echo $memberof_item['g_id'];?>" readonly /><br>

    Member ID:<br>
    <input type="input" name="mid" value="<?php echo $memberof_item['m_id'];?>" readonly/><br>

<?php endforeach; ?>

<input type="submit" name="submit" value="Delele MemberOf" />

</form>

<head>
    <title>MemberOf Update</title>
</head>


<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('memberof_c/update_memberof'); ?>
<?php foreach ($nonmembers as $nonmember_item): ?>

Group ID:<br>
<input type="input" name="group_id" /><br>

Member ID:<br>
<input type="input" name="ID"/><br>

<br>

<input type="submit" name="submit" value="Update MemberOf" />
</form>


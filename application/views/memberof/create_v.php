
<head>
    <title>Create MemberOf</title>
</head>

<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('memberof_c/create_memberof'); ?>

Group ID:<br>
<input type="input" name="group_id" value="<?php echo $groupid;?>" readonly /><br>


Member ID:<br>
<select name = 'selete_mid' >
<?php foreach ($memberid as $memberid_item): ?>
<option value="<?php echo $memberid_item['ID']; ?>"><?php echo $memberid_item['ID']; ?></option>
<?php endforeach; ?>
</select>



<!--<input type="input" name="m_id" value="<?php echo $seleted_id;?>"/><br>-->


<!-- <?php echo form_dropdown('mid', $options2, '');?><br> -->


<br>

<input type="submit" name="submit" value="Add MemberOf" />


</form>


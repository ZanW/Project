<head>
<title>Content Update</title>
</head>
<?php echo form_open('content/update'); ?>
<div class="form-group">
	<label for="id">Content ID</label> <input type="input"
		name="Content ID" value="<?php echo $id;?>" readonly /><br> <label
		for="post_message">Edit the message</label> <input type="text"
		id="post_message" name="post_message"
		data-error="permisson cannot be empty" placeholder="Edit Message"><br>
	<label for="auto_delete">Auto Delete</label> <input type="text"
		id="auto_delete" name="auto_delete"
		data-error="Boolean cannot be empty"
		placeholder=" 0 (false)or 1 (true)"><br> 
  <label for="permisson">Permisson</label>
	<input type="text" id="permission" name="permission"
		data-error="permisson cannot be empty"
		placeholder=" 0 (view/delete)or 1 (view only)"><br>
  <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
  <input type="submit" name="submit" value="Update Content" />
</div>
</form>

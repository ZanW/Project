<?php echo form_open_multipart('content/create')?>
	<div class="form-group">
		<label for="post_message">Group Message</label> <input type="text"
			class="form-control" id="post_message" name="post_message"
			data-error="Message cannot be empty" 
			placeholder="Type Message">
		<label for="auto_delete">Auto Delete</label> <input type="text"
			class="form-control" id="auto_delete" name="auto_delete"
			data-error="Boolean cannot be empty" 
			placeholder="0 (false)or 1 (true)">
			
		<label class="control-label">Select Picture to upload</label>
		
		<input type="file" name="userfile" size="20" id="userfile" value="null"/>
		<br /><br />

		<label for="mid"> Group ID</label> <input type="text" name="gid"
			value="<?php echo $group_id; ?>" readonly><br>
		<label for="mid">Posted by</label> <input type="text" name="first_name"
			value="<?php echo htmlspecialchars($_SESSION['FirstName']); ?>"
			readonly><br>
		<div class="help-block with-errors"></div>
	</div>
	<input type="submit" name="send" class="btn btn-primary" value="Submit">
	<button type="button"
		onclick="location.href='<?php echo site_url('content/create') ?>'"
		class="btn btn-success">Back</button>
</form>

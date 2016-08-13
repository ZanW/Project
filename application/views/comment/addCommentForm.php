<form method="post" action="<?php echo site_url('content/addComment')?>"
	role="form" data-toggle="validator">
	<div class="form-group">
		<label for="content_id">Content ID</label> 
		<input type="text"
			 id="content_id" name="content_id"
			value= "<?php echo $content_id; ?>" readonly><br>
	</div>
		<div class="form-group">
		<label for="com_message">Comment Message</label> <input type="text"
			id="com_message" name="com_message"
			data-error="Comment cannot be empty" placeholder="Enter Comment"  required>
		<div class="help-block with-errors"></div>
	</div>
	
	<div class="form-group">
		<label for="mid">Posted By</label> <input type="text" name="name"
			value="<?php echo htmlspecialchars($_SESSION['FirstName']); ?>"
			readonly><br>
	</div>
	
	<input type="submit" name="send" class="btn btn-primary" value="Submit">
	<button type="button"
		onclick="location.href='<?php echo site_url('group') ?>'"
		class="btn btn-success">Back</button>
</form>

<head>
    <title>Add Public Information</title>
</head>

<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('info/create'); ?>
Post Text Message:<br>
<input type="input" name="post_message" /><br> <br>

Or post a picture or video:<br>
<input type="file" name="file" id="file"><br>

Owner ID:<br>
<input type="input" name="mid"/><br><br>

<input type="submit" name="submit" value="Add Public Info" />

</form>


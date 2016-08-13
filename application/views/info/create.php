
<head>
    <title>Add Public Information</title>
</head>

<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('info/create'); ?>
Post Text Message:<br>
<input type="text" name="post_message" size="50" /><br> <br>

or post a picture or video: 
<input type="file" name="userfile" size="20" id="userfile" value="null" />

<input type="hidden" name="mid" value="<?php echo $mid; ?>" /><br><br>

<input type="submit" name="submit" value="Add Public Info" class="btn btn-success"/>

</form>


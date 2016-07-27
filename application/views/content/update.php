<head>
    <title>Content Update</title>
</head>

<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('content/update'); ?>
<?php foreach ($records as $content_item): ?>

    ID:<br>
    <input type="input" name="id" value="<?php echo $id;?>" readonly /><br>

    Post Message:<br>
    <input type="input" name="post_message" value="<?php echo $content_item['post_message'];?>" /><br>

<?php endforeach; ?>

<input type="submit" name="submit" value="Update Content" />

</form>

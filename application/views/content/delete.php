<head>
    <title>Member Delete</title>
</head>

<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('content/delete'); ?>
<?php foreach ($content as $content_item): ?>

    ID:<br>
    <input type="input" name="id" value="<?php echo $id;?>" readonly /><br>

    Post Message:<br>
    <input type="input" name="post_message" value="<?php echo $content_item['post_message'];?>" readonly/><br>

<?php endforeach; ?>

<input type="submit" name="submit" value="Delete Content" />

</form>

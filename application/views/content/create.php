<head>
    <title>Content Create</title>
</head>

<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('content/create'); ?>
    Post message:<br>
    <input type="input" name="post_message"/><br>

    <input type="submit" name="submit" value="Create Content" />

</form>

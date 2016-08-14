
<head>
    <title>Add Public Information</title>
</head>

<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('info/update'); ?>

<?php foreach ($public_info as $info_item): ?>

    <input type="hidden" name="id" value="<?php echo $id;?>" readonly /><br>

    Update post meessage:<br>
    <input type="text" name="post_message" size="50" value="<?php if ($info_item['post_message'])  echo $info_item['post_message']; ?>" /><br> <br>

    Update post a picture or video:
    <input type="file" name="userfile" size="20" id="userfile" value="<?php echo $info_item['file_path'] ?>" />

    <input type="hidden" name="mid" value="<?php echo $info_item['mid']; ?>" /><br><br>

<?php endforeach; ?>

<input type="submit" name="submit" value="Update Info" class="btn btn-success"/>

</form>


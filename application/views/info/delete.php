
<head>
    <title>Non-Member Update</title>
</head>


<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('info/delete'); ?>
<?php foreach ($public_info as $info_item): ?>

    <input type="hidden" name="id" value="<?php echo $id;?>" readonly /><br>


    <p> <?php echo $info_item['dop']; ?> </p>

    <p> <?php if ($info_item['post_message'])  echo $info_item['post_message']; ?>  </p>

    <p> <?php if ($info_item['post_media'])  echo '<img src="data:image/jpeg;base64,'.base64_encode($info_item['post_media']).'""/>' ?>  </p>
    <br>

<?php endforeach; ?>

<input type="submit" name="submit" value="Delele Info" />

</form>


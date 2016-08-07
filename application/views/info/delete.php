
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

    <p>
     <img src="<?php echo base_url().'uploads/'.$info_item['file_path'] ?>" class="img-responsive"> </p>
    <br>

<?php endforeach; ?>

<input type="submit" name="submit" value="Delele Info" />

</form>


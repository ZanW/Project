<head xmlns="http://www.w3.org/1999/html">
    <title>Welcome to POWON </title>
</head>


<body>

<h2><?php echo $title; ?></h2>

<p>This is a private online group. You need to login to use the service</p>
<br>

<?php foreach ( $public_info as $info_item): ?>

  <p> <?php echo $info_item['dop']; ?> </p>

   <?php if ($info_item['post_message'])  echo $info_item['post_message']; ?>

    <?php if ($info_item['file_path']) { ?>
    <p><img src="<?php echo base_url().'uploads/'.$info_item['file_path'] ?>" class="img-responsive"></p>
    <?php } ?>

     <br><br>

<?php endforeach; ?>

</body>

<script>
    // create a global var before calling external
    // javascript file(s).
    var BASE_PATH = "<?php echo base_url();?>";
</script>

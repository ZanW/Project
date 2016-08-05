<head>
    <title>Compose Email</title>
</head>

<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php $attributes = array('id' => 'create');
echo form_open('email/create', $attributes ); ?>
From:
<input type="email" name="sender_email" value="<?php echo $m_email;?>" readonly/><br>

To:
<input type="email" name="receiver_email" /><br>

Subject:
<input type="input" name="subject" /><br><br>

<textarea rows="10" cols="50" name="email_content" form="create"></textarea>
<br><br>

<input type="submit" name="submit" value="Send" />

</form>



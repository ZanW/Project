<head>
    <title>Email Delete</title>
</head>

<h2><?php echo $title; ?></h2>

<?php $attributes = array('id' => 'delete');
   echo form_open('email/delete', $attributes ); ?>
<?php foreach ($email as $email_item): ?>

    <input type="hidden" name="id" value="<?php echo $id;?>" readonly /><br>

    From:
    <input type="input" name="sender_email" value="<?php echo $email_item['sender_email'];?>" readonly/><br>

    To:
    <input type="input" name="receiver_email" value="<?php echo $email_item['receiver_email'];?>" readonly /><br>

    Date & Time Sent:
    <input type="input" name="dts" value="<?php echo $email_item['dts'];?>" readonly /><br>

    Subject:
    <input type="input" name="subject" value="<?php echo $email_item['subject'];?>" readonly /><br><br>

    <textarea readonly rows="10" cols="50" name="email_content" form="delete"><?php echo $email_item['email_content'];?></textarea><br>

    <!--<input disabled="disabled" type="checkbox" name="unread" />Unread<br> -->
    <br>

<?php endforeach; ?>

<input type="submit" name="submit" value="Confirm Delele" />

</form>



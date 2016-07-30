
<head>
    <title>Member Info</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<h2><?php echo $title; ?></h2>

<h3><?php echo $email_address; ?></h3><br>

<p><a href='<?php echo base_url("index.php/email/create");?>'>Compose a new email</a> </p>

<table>
    <tr>
        <th>From</th>
        <th>Subject</th>
        <th>Date & Time</th>
        <th></th>
    </tr>
    <?php foreach ($inbox as $email_item): ?>
        <tr>
            <td><?php echo $email_item['sender_email']; ?></td>
            <td><a href='<?php echo base_url("index.php/email/detail/".$email_item['id']);?>'><?php echo $email_item['subject']; ?></a></td>
            <td><?php echo $email_item['dts']; ?></td>
            <td><a href='<?php echo base_url("index.php/email/delete/".$email_item['id']);?>'>Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>

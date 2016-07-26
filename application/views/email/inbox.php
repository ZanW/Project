
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

<p><a href='<?php echo base_url("index.php/email/create");?>'>Compose a new email</a> </p>

<table>
    <tr>
        <th>ID</th>
        <th>Sender Email</th>
        <th>Receiver Email</th>
        <th>Date & Time</th>
        <th>Subject</th>
        <th>Email Content</th>
        <th></th>
    </tr>
    <?php foreach ($inbox as $email_item): ?>
        <tr>
            <td><?php echo $email_item['id']; ?></td>
            <td><?php echo $email_item['sender_email']; ?></td>
            <td><?php echo $email_item['receiver_email']; ?></td>
            <td><?php echo $email_item['dts']; ?></td>
            <td><?php echo $email_item['subject']; ?></td>
            <td><?php echo $email_item['email_content']; ?></td>
            <td><a href='<?php echo base_url("index.php/email/delete/".$email_item['id']);?>'>Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>


<head>
    <title>Message</title>
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

<p><a href='<?php echo base_url("index.php/message/inbox_list");?>'>Message Inbox List</a> </p>

<p><a href='<?php echo base_url("index.php/message/create");?>'>Compose a new message</a> </p>

<table>
    <tr>
        <th>ID</th>
        <th>Sender ID</th>
        <th>Receiver ID</th>
        <th>Date & Time</th>
        <th>Message Content</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($message as $message_item): ?>
        <tr>
            <td><?php echo $message_item['id']; ?></td>
            <td><?php echo $message_item['sender_id']; ?></td>
            <td><?php echo $message_item['receiver_id']; ?></td>
            <td><?php echo $message_item['dts']; ?></td>
            <td><?php echo $message_item['message_content']; ?></td>
            <td><a href='<?php echo base_url("index.php/message/detail/".$message_item['id']);?>'>Open</a></td>
            <td><a href='<?php echo base_url("index.php/message/delete/".$message_item['id']);?>'>Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>

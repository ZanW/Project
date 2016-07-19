<head>
    <title> Content </title>
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

<table>
    <tr>
        <th>ID</th>
        <th>Post Message</th>
        <th>Date of Post</th>
        <th>Comment ID</th>
        <th>mid</th>
        <th>gid</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($records as $record_item): ?>
        <tr>
            <td><?php echo $record_item['id']; ?></td>
            <td><?php echo $record_item['post_message']; ?></td>
            <td><?php echo $record_item['dop']; ?></td>
            <td><?php echo $record_item['comment_id']; ?></td>
            <td><?php echo $record_item['mid']; ?></td>
            <td><?php echo $record_item['gid']; ?></td>
            <td><a href='<?php echo base_url("index.php/members/update/".$record_item['id']);?>'>Edit</a></td>
            <td><a href='<?php echo base_url("index.php/members/delete/".$record_item['id']);?>'>Delete</a></td>

        </tr>
    <?php endforeach; ?>
</table>
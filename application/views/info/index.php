
<head>
    <title>Non Member</title>
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
<body>

<h2><?php echo $title; ?></h2>

<p><a href="<?php if (isset($_SESSION['ID'])) echo base_url("index.php/info/create/".$_SESSION['ID']);
    else echo base_url("index.php/info/create/1");?>">Create</a></p>

<table>
    <tr>
        <th>ID</th>
        <th>Post Message</th>
        <th>Post Media</th>
        <th>Date of Posted</th>
        <th>Owner ID</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($public_info as $info_item): ?>
        <tr>
            <td><?php echo $info_item['id']; ?></td>
            <td><?php echo $info_item['post_message']; ?></td>
            <?php if ($info_item['file_path']) { ?>
                <td><img src="<?php echo base_url().'uploads/'.$info_item['file_path'] ?>" class="img-responsive"></td>
            <?php } else { ?>
                <td></td>
            <?php } ?>
            <td> <?php echo $info_item['dop']; ?></td>
            <td> <?php echo $info_item['mid']; ?></td>
            <td> <a href='<?php echo base_url("index.php/info/update/".$info_item['id']);?>'>Edit</a></td>
            <td> <a href='<?php echo base_url("index.php/info/delete/".$info_item['id']);?>'>Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>

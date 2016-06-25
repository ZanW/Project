
<!DOCTYPE html>
<html>
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

<p><a href='<?php echo base_url("index.php/nonmembers/create");?>'>Create</a></p>

<table style="width:100%">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($nonmembers as $nonmember_item): ?>
        <tr>
            <td><?php echo $nonmember_item['id']; ?></td>
            <td><?php echo $nonmember_item['first_name']; ?></td>
            <td><?php echo $nonmember_item['last_name']; ?></td>
            <td> <?php echo $nonmember_item['email']; ?></td>
            <td> <a href='<?php echo base_url("index.php/nonmembers/update/".$nonmember_item['id']);?>'>Edit</a></td>
            <td> <a href='<?php echo base_url("index.php/nonmembers/delete/".$nonmember_item['id']);?>'>Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
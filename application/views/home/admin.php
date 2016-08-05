
<head>
    <title>Administrator </title>

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

<table>
    <tr>
        <th>Features</th>
    </tr>
    <tr>
        <td> <a href='<?php echo base_url("index.php/members/index");?>'>Members</a></td>
    </tr>
    <tr>
        <td> <a href='<?php echo base_url("index.php/group/index");?>'>Group</a></td>
    </tr>
    <tr>
        <td> <a href='<?php echo base_url("index.php/content/index");?>'>Cotent</a></td>
    </tr>
    <tr>
        <td> <a href='<?php echo base_url("index.php/email/inbox_list");?>'>Email</a></td>
    </tr>
</table>



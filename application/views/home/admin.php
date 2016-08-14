
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
<br>

<p>Administrator has a privilege to create, delete, edit all services, including change status of any members </p> <br>

<p>Please select a service below to manage.</p><br>

<table>
    <tr>
        <th>Manage Features</th>
    </tr>
    <tr>
        <td> <a href='<?php echo base_url("index.php/members/index");?>'>Members</a></td>
    </tr>
    <tr>
        <td> <a href='<?php echo base_url("index.php/group/");?>'>Groups</a></td>
    </tr>
    <tr>
        <td> <a href='<?php echo base_url("index.php/memberof_c/");?>'>Group List</a></td>
    </tr>
    <tr>
        <td> <a href='<?php echo base_url("index.php/content/");?>'>Private Post Content</a></td>
    </tr>
    <tr>
        <td> <a href='<?php echo base_url("index.php/info");?>'>Public Post Content</a></td>
    </tr>
    <tr>
        <td> <a href='<?php echo base_url("index.php/email/inbox_list");?>'>Email</a></td>
    </tr>
</table>



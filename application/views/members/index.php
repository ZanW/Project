
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
<br>

<p>Select <span class="label label-info">Edit</span> on the right column to change a member's status</p><br>

<table>
  <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Status</th>
      <th></th>
  </tr>
<?php foreach ($members as $member_item): ?>
  <tr>
      <td><?php echo $member_item['ID']; ?></td>
      <td><?php echo $member_item['FirstName']; ?></td>
      <td><?php echo $member_item['LastName']; ?></td>
      <td><?php echo $member_item['Email']; ?></td>
      <td><?php if ($member_item['status'] == 0)  echo "Active"; elseif ($member_item['status'] == 1) echo "Inactive"; else echo "Suspended"; ?></td>
      <td><a href='<?php echo base_url("index.php/members/update/".$member_item['ID']);?>'><button type="button" class="btn btn-success">Edit</button></a></td>
  </tr>
<?php endforeach; ?>
</table>






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

<p><a href='<?php echo base_url("index.php/members/create");?>'>Create</a></p>

<table>
  <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th></th>
      <th></th>
  </tr>
<?php foreach ($members as $member_item): ?>
  <tr>
      <td><?php echo $member_item['id']; ?></td>
      <td><?php echo $member_item['first_name']; ?></td>
      <td><?php echo $member_item['last_name']; ?></td>
      <td><?php echo $member_item['email']; ?></td>
      <td><a href='<?php echo base_url("index.php/members/update/".$member_item['id']);?>'>Edit</a></td>
      <td><a href='<?php echo base_url("index.php/members/delete/".$member_item['id']);?>'>Delete</a></td>
  </tr>	
<?php endforeach; ?>
</table>





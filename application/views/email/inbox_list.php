
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

<table>
  <tr>
      <th>ID</th>
      <th>Email</th>
      <th></th>
  </tr>
<?php foreach ($members as $member_item): ?>
  <tr>
      <td><?php echo $member_item['ID']; ?></td>
      <td><?php echo $member_item['Email']; ?></td>
      <td><a href='<?php echo base_url("index.php/email/inbox/".$member_item['ID']);?>'>Inbox</a></td>
  </tr>	
<?php endforeach; ?>
</table>





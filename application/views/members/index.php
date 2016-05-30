
<!DOCTYPE html>
<html>
<head>
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

<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
  </tr>
<?php foreach ($members as $member_item): ?>
  <tr>
    <td><?php echo $member_item['id']; ?></td>
    <td><?php echo $member_item['first_name']; ?></td>
    <td><?php echo $member_item['last_name']; ?></td>
    <td> <?php echo $member_item['email']; ?></td>
  </tr>	
<?php endforeach; ?>
</table>

</body>
</html>






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
    <th>Group ID</th>
    <th>Group Name</th>
    <th>Owner ID</th>
    <th>Owner Name</th>
	<th>Size</th>
  </tr>
<?php foreach ($grouplist as $grouplist_item): ?>
  <tr>
   
	<td><?php echo $grouplist_item['group_id']; ?> </a></td>
	
    <td><?php echo $grouplist_item['group_name']; ?></td>
   <!--<td></td>-->
    <td><?php echo $grouplist_item['owner_id']; ?></td>
    <td> <?php echo $grouplist_item['owner_name']; ?></td>
	<td> <?php echo $grouplist_item['Member Size']; ?></td>
   <!--<td></td>-->
  </tr>	
<?php endforeach; ?>
</table>

</body>
</html>





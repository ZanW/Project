
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
    text-align: center;
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
    <th>Action</th>
  </tr>
<?php foreach ($memberoflist as $memberoflist_item): ?>
  <tr>
   
	<td><?php echo $memberoflist_item['group_id']; ?></td>	
    <td><?php echo $memberoflist_item['group_name']; ?></td>
    <td><?php echo $memberoflist_item['ID']; ?></td>
    <td><?php echo $memberoflist_item['FirstName']; ?></td>
    <td><a href='<?php echo base_url("index.php/memberof_c/groupdetail_by_id/".$memberoflist_item['group_id']);?>'>Enter This Group</a> 

    </td>


    <!--<td><a href='<?php echo base_url("index.php/memberof_c/delete_memberof");?>'>Delete</a></td>-->

  </tr>	
<?php endforeach; ?>
</table>

</body>
</html>





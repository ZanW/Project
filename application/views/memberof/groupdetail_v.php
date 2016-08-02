
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


<h2><?php echo "Group ".$id." Detail";; ?></h2>

<p><a href='<?php echo base_url("index.php/memberof_c/create_memberof/".$id);?>'>Add Member to This Group</a></p>


<table style="width:100%">
  <tr>
    <th>Group ID</th>   
    <th>Member ID</th>
    <th>Action</th>    
  </tr>

<?php foreach ($group_detail as $groupdetail_item): ?>
  <tr>  
	<td><?php echo $groupdetail_item['g_id']; ?></td>
  <td><?php echo $groupdetail_item['m_id']; ?></td>
  <td><a href='<?php echo base_url("index.php/memberof_c/delete_memberof/".$groupdetail_item['g_id']."/".$groupdetail_item['m_id']);?>'>Delete</a></td>


  </tr>	
<?php endforeach; ?>
</table>

</body>
</html>





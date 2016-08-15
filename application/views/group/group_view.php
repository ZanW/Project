
<p>
	<a href="<?php echo site_url('group/openGroupForm') ?>" class="btn btn-primary">Add
		New</a>
</p>
<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<caption>My Own Groups</caption>
		<thead>
			<tr>
				<th width="80px">GroupID</th>
				<th>Group Name</th>
				<th>Owner ID</th>
				<th width="80px">Action</th>
			</tr>
		</thead>
		<tbody>
      <?php
    if ( $data_get == NULL )
    {
        ?>
  <?php
    }
    else
    {
        foreach ( $data_get as $row )
        {
            ?>
        <tr>
				<td><?php echo $row->group_id; ?></td> <!-- add link to see conversation -->
				<td><?php echo $row->group_name; ?></td>
				<td><?php echo $row->POWON_id; ?></td>
		<td>
           <a href="<?php echo site_url('group/openEditForm/' . $row->group_id); ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
           <a href="<?php echo site_url('group/delete/' . $row->group_id); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
          </td>
      <?php
        }
    }
    ?>
        </tr>
		</tbody>
	</table>	

	<table class="table table-bordered table-hover table-striped">
		<caption>I belong to following groups including the groups that I created(Click on a Group to see contents)</caption>
		<tbody>
		<tr>
			<th>Group Name</th><th>GroupID</th><th>Group Owner Name</th>
		</tr>
		
      <?php
    if ( $data_get_all == NULL )
    {
        ?>
  <?php
    }
    else
    {
        foreach ( $data_get_all as $row )
        {
            ?>
				<tr class="table-row"data-href="<?php echo site_url('content/index/'. $row['group_id'] )  ?>"> <!-- Pass the group ID here to open a specific group-->
				<td><?php echo $row['group_name'] ?></td><td><?php echo $row['group_id'] ?></td><td><?php echo $row['FirstName'] ?></td>
				</tr>
      <?php
        }
    }
    ?>
		</tbody>
	</table>
	
	
	
	
		<table class="table table-bordered table-hover table-striped">
		<caption>I belong to following group that other members created</caption>
		<tbody>
		<tr>
			<th>Group Name</th><th>GroupID</th><th>Owner Name</th><th>Action</th>
		</tr>
      <?php
    if ( $data_get_other_group == NULL )
    {
        ?>
  <?php
    }
    else
    {
        foreach ( $data_get_other_group as $row )
        {
            ?>
				<tr class="table-row"data-href="<?php echo site_url('content/index/'. $row['group_id'] )  ?>"> <!-- Pass the group ID here to open a specific group-->
				<td><?php echo $row['group_name'] ?></td><td><?php echo $row['group_id'] ?></td><td><?php echo $row['FirstName'] ?></td>
				<td><a href="<?php echo site_url('group/leaveGroup/' . $row['g_id'] ."/". $row['m_id'] ); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></td>
				</tr>
      <?php
        }
    }
    ?>
		</tbody>
	</table>
	
</div>

<script type="text/javascript">
$(document).ready(function($) {
    $(".table-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>

<style type="text/css">
.table-row{
cursor:pointer;
}
</style>
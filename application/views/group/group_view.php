
<p>
	<a href="<?php echo site_url('group/openGroupForm') ?>" class="btn btn-primary">Add
		New</a>
</p>
<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<caption>List Data</caption>
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
				<td><?php echo $row->group_id; ?></td>
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
</div>
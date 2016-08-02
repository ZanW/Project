
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
		<caption>I belong to following groups(Click on a Group to see contents)</caption>
		<tbody>
		<tr>
			<th>Group Name</th><th>GroupID</th>
		</tr>
		
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

				<tr class="table-row"data-href="<?php echo site_url('content/index') ?>">
				<td><?php echo $row->group_name ?></td><td><?php echo $row->group_id ?></td>
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
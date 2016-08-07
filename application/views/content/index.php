<head>
<title>Content</title>
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


<div class="table-responsive" style="overflow-x:auto;">
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>Post Message</th>
			<th>Image</th>
			<th>Date of Post</th>
			<th>Posted By Name</th>
			<th>Group Name</th>
			<th>Comments</th>
			<th>Actions</th>
			
			<th></th>
			<th></th>
		</tr>
    <?php foreach ($records as $record_item): ?>
        <tr>
			<td><?php echo $record_item['post_message']; ?></td>
			<td><img src="<?php echo base_url().'uploads/'.$record_item['file_path'] ?>" class="img-responsive">
			<td><?php echo $record_item['dop']; ?></td>
			<td><?php echo $record_item['FirstName']; ?></td>
			<td><?php echo $record_item['group_name']; ?></td>
			<td><?php 
				foreach ( $records_comments as $comments ):
				if($comments['content_id'] == $record_item['id'] ) :
    				    echo $comments['com_message'] . " by ";
                        echo $comments['first_name'] ."\r\n";
                    endif;
                endforeach;
            ?></td>
			<td><a
				href='<?php echo base_url("index.php/content/openCommentForm/".$record_item['id']);?>'>Add Comment</a></td>
			<td>
			<!-- ACTIONS only availabel to content owner -->
            <?php if($_SESSION['ID'] == $record_item['POWON_id'] ) : ?>
                <td><a
				href='<?php echo base_url("index.php/content/update/".$record_item['id']);?>'>Edit</a></td>
			<td><a
				href='<?php echo base_url("index.php/content/delete/".$record_item['id']);?>'>Delete</a></td>
			<?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>
	<a href='<?php echo base_url("index.php/content/openAddGroupMessageForm/".$group_id);?>'
		class="btn btn-primary btn-lg active" role="button"
		aria-pressed="true">Add Group Message</a>
</div>
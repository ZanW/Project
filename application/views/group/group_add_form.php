  <form method="post" action="<?php echo site_url('group/add')?>" role="form">
  <div class="form-group">
    <label for="gn">Group Name</label>
    <input type="text" class="form-control" id="gn" name="gn">
  </div>
  <div class="form-group">
    <label for="mid">Owner ID</label>
    <input type="text" class="form-control" id="id" name="id">
  </div>
  <input type="submit" name="send" class="btn btn-primary" value="Submit">
  <button type="button" onclick="location.href='<?php echo site_url('group') ?>'" class="btn btn-success">Back</button>
</form>

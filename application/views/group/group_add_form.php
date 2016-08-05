  <form method="post" action="<?php echo site_url('group/add')?>" role="form" data-toggle="validator">
  <div class="form-group">
    <label for="gn">Group Name</label>
    <input type="text" class="form-control" id="gn" name="gn" data-error="Group Name cannot be empty" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group">
    <label for="mid">Owner ID</label>
    <input type="text" name="id" value="<?php echo htmlspecialchars($_SESSION['ID']); ?>" readonly><br>
    <label for="mid">Owner Name</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($_SESSION['FirstName']); ?>" readonly><br>
  </div>
  <input type="submit" name="send" class="btn btn-primary" value="Submit">
  <button type="button" onclick="location.href='<?php echo site_url('group') ?>'" class="btn btn-success">Back</button>
</form>
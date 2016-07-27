<?php echo form_open('group/edit', 'role="form"'); ?>
  <div class="form-group">
    <label for="fn">Group Name</label>
    <input type="text" class="form-control" id="gn" name="gn" placeholder="New Group Name">
  </div>
  <input type="hidden" name="gid" value="<?php echo $gid; ?>" />
  <input type="submit" name="submit" class="btn btn-primary" value="Update">
  <button type="button" onclick="location.href='<?php echo site_url('group') ?>'" class="btn btn-success">Back</button>
</form>
<?php echo form_close(); ?>
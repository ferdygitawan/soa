<div class="col-md-12">
	<h1 class="page-header">
	<?php echo lang('edit_user_heading');?>
	</h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>
	<div class="col-md-6">
		<div class="form-group">
			<?php echo form_label('First Name', 'first_name', ['class' => 'control-label']); ?>
			<?php echo form_input($first_name, '', ['class' => 'form-control', 'placeholder' => 'First Name']); ?>
		</div>
		<div class="form-group">
				<?php echo form_label('Last Name', 'last_name', ['class' => 'control-label']); ?>
				<?php echo form_input($last_name, '', ['class' => 'form-control', 'placeholder' => 'Last Name']); ?>
		</div>
		<div class="form-group">
				<?php echo form_label('Company', 'company', ['class' => 'control-label']); ?>
				<?php echo form_input($company, '', ['class' => 'form-control', 'placeholder' => 'Company']); ?>
		</div>
		<div class="form-group">
				<?php echo form_label('Phone', 'phone', ['class' => 'control-label']); ?>
				<?php echo form_input($phone, '', ['class' => 'form-control', 'placeholder' => 'User phone']); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Password', 'password', ['class' => 'control-label']); ?>
			<?php echo form_input($password, '', ['class' => 'form-control', 'placeholder' => 'Password']); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Password Confirm', 'password_confirm', ['class' => 'control-label']); ?>
			<?php echo form_input($password_confirm, '', ['class' => 'form-control', 'placeholder' => 'Password Confirm']); ?>
		</div>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              &emsp; <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php //echo form_hidden($csrf); ?>
	  			<!-- active -->
			<h3><?php echo "Status";?></h3>
			<div class="checkbox">
				<label>
					<?php echo form_checkbox('active', 1, (bool) $user->active); ?>
					<b>Active</b>
				</label>
			</div>
      <div class="form-group pull-right">
	 	<a href="<?php echo site_url('admin/auth') ?>" class="btn btn-danger">Cancel</a>
		<?php echo form_submit('', 'Update User', ['class' => 'btn btn-primary']); ?>
	  </div>
</div>
<?php echo form_close();?>
</div>
<div class="col-md-12">
	<h1 class="page-header">
	<?php echo "Create User";?>
</h1>
<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("admin/auth/create_user");?>
		<div class="col-md-6">
			<div class="form-group">
			<?php echo form_label('First Name', 'first_name', ['class' => 'control-label']); ?>
			<?php echo form_input('first_name', set_value('first_name'), ['class' => 'form-control', 'placeholder' => 'First Name']); ?>
			</div>
			<div class="form-group">
			<?php echo form_label('Last Name', 'last_name', ['class' => 'control-label']); ?>
			<?php echo form_input('last_name', set_value('last_name'), ['class' => 'form-control', 'placeholder' => 'Last Name']); ?>
			</div>
			<div class="form-group">
			<?php echo form_label('Password', 'password', ['class' => 'control-label']); ?>
			<?php echo form_input($password, set_value('password'), ['class' => 'form-control', 'placeholder' => 'Password']); ?>
			</div>
			<div class="form-group">
			<?php echo form_label('Password Confirm', 'password_confirm', ['class' => 'control-label']); ?>
			<?php echo form_input($password_confirm, '', ['class' => 'form-control', 'placeholder' => 'Password Confirm']); ?>
			</div>
		</div>
	<div class="col-md-6">
	<div class="form-group">
      <?php
      if($identity_column!=='email') {
		  echo form_label('Username', 'identity', ['class' => 'control-label']);
          echo form_error('identity');
		  echo form_input($identity, '', ['class' => 'form-control', 'placeholder' => 'Username']);
      }
      ?>
	  </div>
      <div class="form-group">
				<?php echo form_label('Email', 'email', ['class' => 'control-label']); ?>
				<?php echo form_input('email', set_value('email'), ['class' => 'form-control', 'placeholder' => 'User email']); ?>
      </div>
     <div class="form-group">
				<?php echo form_label('Company', 'company', ['class' => 'control-label']); ?>
				<?php echo form_input('company', set_value('company'), ['class' => 'form-control', 'placeholder' => 'Company']); ?>
      </div>
      <div class="form-group">
				<?php echo form_label('Phone', 'phone', ['class' => 'control-label']); ?>
				<?php echo form_input('phone', set_value('phone'), ['class' => 'form-control', 'placeholder' => 'User phone']); ?>
      </div>
	<div class="form-group pull-right">
	<?php echo form_submit('', 'Add User', ['class' => 'btn btn-primary']);?>
	</div>
</div>
<?php echo form_close();?>
</div>
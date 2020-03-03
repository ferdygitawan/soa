<div class="col-md-12">
<h1><?php echo lang('create_group_heading');?></h1>
<p><?php echo lang('create_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("admin/auth/create_group");?>
	<div class="col-md-6">
		<div class="form-group">
			<?php echo form_label('Group Name', 'group_name', ['class' => 'control-label']); ?>
            <?php echo form_input($group_name, set_value('group_name'), ['class' => 'form-control', 'placeholder' => 'Group Name']);?>
		</div>
		<div class="form-group">
			<?php echo form_label('Group Description', 'description', ['class' => 'control-label']); ?>
			<?php echo form_input($description, set_value('description'), ['class' => 'form-control', 'placeholder' => 'Group Description']);?>
		</div>
		<div class="form-group">
			<?php echo form_submit('', 'Add Group', ['class' => 'btn btn-primary']); ?>
		</div>
<?php echo form_close();?>
<div>
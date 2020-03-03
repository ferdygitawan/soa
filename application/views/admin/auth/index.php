<div class="col-md-12">
	<h1 class="page-header">
    <?php echo lang('index_heading');?> 
    <small>
      <?php echo "List" ?>
    </small>
  </h1>

<div id="infoMessage"><?php echo $message;?></div>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-striped table-hovered" id="dataTable">
				<thead>
					<th><?php echo lang('index_fname_th');?></th>
					<th><?php echo lang('index_lname_th');?></th>
					<th><?php echo lang('index_email_th');?></th>
					<th><?php echo lang('index_groups_th');?></th>
					<th><?php echo lang('index_status_th');?></th>
					<th><?php echo lang('index_action_th');?></th>
				</thead>
			<tbody>
			<?php foreach ($users as $user):?>
				<tr>
					<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
					<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
					<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
					<td>
						<?php foreach ($user->groups as $group):?>
						<?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8') ;?><br />
						<?php endforeach?>
					</td>
					<!--td><?php //echo ($user->active) ? anchor("admin/auth/deactivate/".$user->id, lang('index_active_link')) : anchor("admin/auth/activate/". $user->id, lang('index_inactive_link'));?></td -->
					<td>
						<?php 
							if ($user->active) {
								echo '<label class="label label-success">active</label>';
							} else {
								echo '<label class="label label-danger">not active</label>';
							}
						?>
					</td>
					<td>
						<?php echo anchor("admin/auth/edit_user/".$user->id, '<i class="fa fa-pencil"></i>', ['', "class" => "btn btn-xs btn-warning"]);?>
					</td>
				</tr>
			<?php endforeach;?>
			</tbody>
			</table>
			</div>
			</div>
			</div>

<p><?php echo anchor('admin/auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('admin/auth/create_group', lang('index_create_group_link'))?></p>
</div>
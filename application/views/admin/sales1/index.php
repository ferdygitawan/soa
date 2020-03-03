<div class="col-md-12">
	
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

	<a href="<?php echo site_url('admin/payment1/confirmation/') ?>" class="btn btn-primary pull-right">Add Payment</a><br><br>
	<?php if ($sales1): ?>
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-hovered" id="dataTable">
						<thead>
							<th>Payment Number</th>
							<th>Customer</th>
							<th>Total Amount</th>
							<th><i class="fa fa-dollar"></i></th>
							<th></th>
						</thead>
						<tbody>
							<?php foreach ($sales1 as $sale1): ?>			
								<tr>
									<td><?php echo $this->m_sale->get_bkm_sale_id($sale1->id) ?></td>
									<td><?php echo $this->m_sale->get_customer_sale_id($sale1->id) ?></td>
									<td><?php echo number_format($this->m_sale->get_total_amount_by_sale_id($sale1->id)) ?></td>
									<td><?php echo $sale1->paid ? '<i class="fa fa-check">' : ''; ?></td>
									
									<td>
										<!-- view button: detail -->
										<a href="<?php echo site_url('admin/sale1/'.$sale1->id) ?>" class="btn btn-xs btn-success">
											<i class="fa fa-eye"></i>
										</a>
										<!-- edit button -->
										<!-- <a href="<?php echo site_url('admin/sale1/'.$sale1->id.'/edit') ?>" class="btn btn-xs btn-warning">
											<i class="fa fa-pencil"></i>
										</a> -->
										<!-- delete button -->
										<?php echo anchor("admin/sale1/delete/".$sale1->id, '<i class="fa fa-times"></i>', ['onclick' => "return confirm('Do you want delete this sale?')", "class" => "btn btn-xs btn-danger"]);
										?>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?php else: ?>
		<h3>No Sales Order</h3>
	<?php endif ?>

</div>
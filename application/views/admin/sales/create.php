<div class="col-md-12" ng-app="saleApp" ng-controller="ProductListCtrl">
	<div ng-model="purchaseOrSale" ng-init="purchaseOrSale = 1"></div>
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <?php $this->load->view('admin/partials/_validation_errors'); ?>

  <?php echo form_open('admin/sale/create'); ?>
  	<!-- Customer -->
		<div class="form-group">
  		<?php echo form_label('Customer', 'customer_id', ['class' => 'control-label']); ?>
  		<?php echo form_dropdown('customer_id', $customer_options, set_value('category'), ['class' => 'form-control', 'required' => 'required']); ?>
		</div>

  	<!-- Sales order_no -->
  	<div class="form-group">
  		<?php echo form_label('Sales Order', 'order_no', ['class' => 'control-label']); ?>
			<?php echo form_input('order_no', $order_no, ['class' => 'form-control']); ?>
  	</div>
		
		<!-- status -->
		<?php echo form_label('Status (use yyyy-mm-dd format if date form input not working)', 'status', ['class' => 'control-label']); ?>
  	<div class="row">
			<!-- accepted checkbox -->
			<div class="col-md-3">
				<div class="checkbox">
					<label>				
						<?php echo form_checkbox('accepted', 1, FALSE); ?>
						<i class="fa fa-check-circle-o"></i> Accepted
						<input type="date" class="form-control" name="accepted_date" value="<?php echo set_value('accepted_date') ?>">
					</label>
				</div>
			</div>
			
			<!-- paid checkbox -->
			<div class="col-md-3">
				<div class="checkbox">
					<label>				
						<?php echo form_checkbox('paid', 1, FALSE); ?>
						<i class="fa fa-dollar"></i> Paid
						<input type="date" class="form-control" name="paid_date" value="<?php echo set_value('paid_date') ?>">
					</label>
				</div>
			</div>

			<!-- shipped checkbox -->
			<div class="col-md-3">
				<div class="checkbox">
					<label>				
						<?php echo form_checkbox('shipped', 1, FALSE); ?>
						<i class="fa fa-ship"></i> Shipped
						<input type="date" class="form-control" name="shipped_date" value="<?php echo set_value('shipped_date') ?>">
					</label>
				</div>
			</div>

			<!-- recived checkbox -->
			<div class="col-md-3">
				<div class="checkbox">
					<label>				
						<?php echo form_checkbox('recived', 1, FALSE); ?>
						<i class="fa fa-building"></i> Recived
						<input type="date" class="form-control" name="recived_date" value="<?php echo set_value('recived_date') ?>">
					</label>
				</div>
			</div>
		</div>
		
		<!-- counter -->
		<!-- <input type="hidden" id="numItem" value="" /> -->
		
		<?php echo form_label('Products', 'product', ['class' => 'control-label']); ?>
		<!-- product list -->
		<div class="col-md-12">
		<div class="table-responsive">
		<table id="productList" class="table table-striped">
			<thead>
				<th>Product</th>
				<th>Quantity</th>
				<th>Discount Price (%)</th>
				<th>Price</th>
				<th>Amount</th>
				<th></th>
			</thead>
		</table>
		</div>
		<input type="hidden" ng-model="counter" name="counter" value="{{ counter }}">
		<input type="hidden" ng-model="totalAmount" name="total_amount" value="{{ total_amount }}">
		<div class="row">
			<!-- add button -->
			<div class="col-md-6">
				<a ng-click="addProduct(1)" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Product</a>
			</div>
			<!-- total amount -->
			<div class="col-md-6">
				<div class="total-amount">
					<a ng-show="totalAmount == 0" ng-click="calculateTotalAmount()">Calculate Total Amount</a>
					<h4 ng-show="totalAmount != 0">Total Amount {{ totalAmount }}</h4>
				</div>
			</div>
		</div>
		
		<!-- notes -->
		<div class="form-group">
			<?php echo form_label('Notes', 'notes', ['class' => 'control-label']); ?>
			<?php echo form_textarea('notes', set_value('notes'), ['class' => 'form-control']); ?>
		</div>
		
		<hr>
		<div class="form-group pull-right">
			<a href="<?php echo site_url('admin/sale') ?>" class="btn btn-danger">Cancel</a>
			<?php echo form_submit('', 'Process sale order', ['class' => 'btn btn-primary']); ?>
		</div>
  <?php echo form_close(); ?>
</div>
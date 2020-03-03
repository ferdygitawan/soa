<div class="col-md-12">
	<h1 class="page-header">
    <?php echo "Payment" ?> 
    <small>
      <?php echo "Create" ?>
    </small>
  </h1>

<?php echo form_open_multipart('admin/payment1/confirmation', ['class' => 'form-horizontal']); ?>
	<!-- Order Number -->
		<div class="form-group">
		<label class="col-md-4 control-label">Invoice Number</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="inv_no" value="<?php echo set_value('inv_no') ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">Payment Number</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="bkm_no" value="">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label">Sales Order Number</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="order_no" value="">
		</div>
	</div>

	<!-- Seller Bank -->
	<div class="form-group">
		<label class="col-md-4 control-label">Destination Bank</label>
		<div class="col-md-6">
			<select class="form-control" name="merchant_bank">
				<option value="">-Select Bank-</option>
				<option value="BCA">BCA</option>
				<option value="Mandiri">Mandiri</option>
				<option value="BRI">BRI</option>
				<option value="BNI">BNI</option>
				<option value="OCBC NISP">OCBC NISP</option>
			</select>
		</div>
	</div>

	<!-- Cutomer Bank -->
	<div class="form-group">
		<label class="col-md-4 control-label">Your Bank</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="customer_bank" value="<?php echo set_value('customer_bank') ?>" placeholder="BCA, BRI, BNI, Mandiri, Others">
		</div>
	</div>

	<!-- Cutomer Bank Account-->
	<div class="form-group">
		<label class="col-md-4 control-label">Account Name</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="customer_bank_account" value="<?php echo set_value('customer_bank_account') ?>" placeholder="John Lennon">
		</div>
	</div>

	<!-- Total Amount-->
	<div class="form-group">
		<label class="col-md-4 control-label">Total Amount</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="total_amount" placeholder="-Rp-" value="<?php echo set_value('total_amount') ?>">
		</div>
	</div>

	<!-- Transfer Date-->
	<div class="form-group">
		<label class="col-md-4 control-label">Payment Date</label>
		<div class="col-md-6">
			<input type="date" class="form-control" name="payment_date" value="<?php echo set_value('payment_date') ?>">
		</div>
	</div>
		<div class="form-group">
				<?php echo form_label('Image', 'img', ['class' => 'col-md-4 control-label']); ?>
				<div class="col-md-6">
				<input type="file" name="img" class="form-control">
			</div>
			</div>
	<!-- Button-->
	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<?php echo form_submit('', 'Confirm', ['class' => 'btn btn-primary']); ?>
		</div>
	</div>
	</div>
		</div>
	</div>
	</div>
<?php echo form_close(); ?>

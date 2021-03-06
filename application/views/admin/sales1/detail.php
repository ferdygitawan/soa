<div class="col-md-12">
	<h1 class="page-header">
    <?php echo $data['title'] ?> 
    <small>
      <?php echo $data['sub_title'] ?>
    </small>
  </h1>

  <h1>
  	<?php echo $sale1->first_row()->order_no ?>
    <?php if ($this->m_sale->is_completed($sale1->first_row()->sale_id)): ?>
      <span class="label label-success">C O M P L E T E D</span>
    <?php endif ?>
  </h1>
  <div class="row">
    <div class="col-md-3">
      <h3>Customer Data</h3>
      <p><b>Name:</b> <?php echo $sale1->first_row()->customer_name ?></p>
      <p><b>Email:</b> <?php echo $sale1->first_row()->email ?></p>
      <p><b>Phone:</b> <?php echo $sale1->first_row()->phone ?></p>
    </div>
    <div class="col-md-5">
      <h3><br></h3>
      <p><b>Address:</b> <?php echo $sale1->first_row()->address ?></p>
      <p><b>City:</b> <?php echo $sale1->first_row()->city ?></p>
      <p><b>Province:</b> <?php echo $sale1->first_row()->province ?></p>
      <p><b>Country:</b> <?php echo $sale1->first_row()->country ?></p>
      <p><b>ZIP:</b> <?php echo $sale1->first_row()->zip ?></p>
    </div>
    <div class="col-md-4">
      <h3>Order Status</h3>
      <p><b>Order Date:</b> <?php echo date('Y-m-d', strtotime($sale1->first_row()->order_date)) ?></p>
      <p><b>Accepted:</b> <?php echo $sale1->first_row()->accepted ? $sale1->first_row()->accepted_date : '-'; ?></p>
      <p><b>Paid:</b> <?php echo $sale1->first_row()->paid ? $sale1->first_row()->paid_date : '-'; ?></p>
      <p><b>Shipped:</b> <?php echo $sale1->first_row()->shipped ? $sale1->first_row()->shipped_date : '-'; ?></p>
      <p><b>Recived:</b> <?php echo $sale1->first_row()->recived ? $sale1->first_row()->recived_date : '-'; ?></p>
    </div>
  </div>
  
  <!-- payment confirmation -->
  <?php if ($payment_confs): ?>
    <h3>Payment Confirmation</h3>
		<div class="col-md-12">
		<div class="table-responsive">
		<table class="table table-striped table-hovered">
      <thead>
        <th>Merchant Bank</th>
        <th>Customer Bank</th>
        <th>Customer Bank Acc.</th>
        <th>Total Payment</th>
        <th>Payment Date</th>
      </thead>
      <tbody>
        <tbody>
          <?php foreach ($payment_confs as $pc): ?>
            <tr>
              <td><?php echo $pc->merchant_bank ?></td>
              <td><?php echo $pc->customer_bank ?></td>
              <td><?php echo $pc->customer_bank_account ?></td>
              <td><?php echo number_format($pc->total_amount) ?></td>
              <td><?php echo $pc->payment_date ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </tbody>
    </table>
  <?php endif ?>
</div>
</div>

  <hr>
  
  <!-- product detail -->
  <div class="row">
    <div class="col-md-12">
      <h3>Products Detail</h3>
		<div class="table-responsive">
      <table class="table table-stripped table-bordered">
        <thead>
          <th>Product Name</th>
          <th>Qty</th>
		  <th>Diskon (%)</th>
          <th>Price @</th>
          <th>Amount</th>
        </thead>
        <tbody>
          <?php $total_amount = 0 ?>
          <?php foreach ($sale1->result() as $s): ?>            
            <tr>
              <td><?php echo $s->product_name ?></td>
              <td><?php echo $s->product_qty ?></td>
              <td><?php echo number_format($s->diskon_price) ?></td>
			  <td><?php echo number_format($s->product_price) ?></td>
              <td><?php echo number_format(($s->product_price * $s->product_qty)-(($s->product_price * $s->product_qty)*(($s->diskon_price)/100))) ?></td>
              <?php $total_amount += (($s->product_price * $s->product_qty)-(($s->product_price * $s->product_qty)*(($s->diskon_price)/100))) ?>
            </tr>
          <?php endforeach ?>
          <tr>
            <td colspan="4"></td>
            <td><?php echo number_format($total_amount) ?></td>
          </tr>
        </tbody>
      </table>
    </div>
	</div>
  </div>
  
  <!-- notes -->
  <div class="row">
    <div class="col-md-12">
      <h4>Notes:</h4>
      <p><?php echo $sale1->first_row()->notes ?></p>
    </div>
  </div>

  <?php if (!$this->m_sale->is_completed($sale1->first_row()->sale_id)): ?>
    <?php echo form_label('Update Status', 'status', ['class' => 'control-label']); ?>
    <?php echo form_open('admin/sale1/update-status/'.$sale1->first_row()->sale_id); ?>
      <?php echo form_hidden('order_no', $sale1->first_row()->order_no); ?>
      <?php echo form_hidden('notes', $sale1->first_row()->notes); ?>
      <?php echo form_hidden('customer_id', $sale1->first_row()->customer_id); ?>
      <!-- status -->
      <div class="row">
        <!-- paid checkbox -->
        <div class="col-md-3">
          <div class="checkbox">
            <label>       
              <?php echo form_checkbox('paid', 1, $sale1->first_row()->paid); ?>
              <i class="fa fa-dollar"></i> Paid
              <input type="date" class="form-control" name="paid_date" value="<?php if($sale1->first_row()->paid_date) { echo date('Y-m-d', strtotime($sale1->first_row()->paid_date)); } ?>">
            </label>
          </div>
        </div>
      </div>
      <div class="form-group pull-right">
        <a href="<?php echo site_url('admin/sale1') ?>" class="btn btn-danger">Back</a>
        <button class="btn btn-primary">Update</button>
      </div>
    <?php echo form_close(); ?>
  <?php else: ?>
    <!-- <h1><span class="label label-success">C O M P L E T E D</span> -->
    <a href="<?php echo site_url('admin/sale1') ?>" class="btn btn-danger pull-right">Back</a></h1>
  <?php endif ?>

</div>
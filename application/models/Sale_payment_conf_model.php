<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_payment_conf_model extends CI_Model {

	/**
	 * rules for form validation
	 * @var array
	 */
	public $conf_payment_input_form_val = [
		[
			'field' => 'order_no',
			'label' => 'Order Number',
			'rules' => 'trim|required|min_length[10]|max_length[10]',
		],
		[
			'field' => 'bkm_no',
			'label' => 'BKM Number',
			'rules' => 'trim|required|min_length[11]|max_length[11]',
		],
		[
			'field' => 'inv_no',
			'label' => 'Invoice Number',
			'rules' => 'required',
		],
		[
			'field' => 'merchant_bank',
			'label' => 'Merchant Bank',
			'rules' => 'required',
		],
		[
			'field' => 'customer_bank',
			'label' => 'Customer Bank',
			'rules' => 'required',
		],
		[
			'field' => 'customer_bank_account',
			'label' => 'Customer Bank Account',
			'rules' => 'required',
		],
		[
			'field' => 'total_amount',
			'label' => 'Total Amount',
			'rules' => 'required|numeric',
		],
		[
			'field' => 'payment_date',
			'label' => 'Payment Date',
			'rules' => 'required',
		]
	];

	/**
	 * setting input value from form to db
	 * @param $sale_id, $input
	 * @return array
	 */
	private function set_input($sale_id, $input) {
		$data = [
			'merchant_bank' => $this->input->post('merchant_bank'),
			'customer_bank' => $this->input->post('customer_bank'),
			'customer_bank_account' => $this->input->post('customer_bank_account'),
			'total_amount' => $this->input->post('total_amount'),
			'payment_date' => $this->input->post('payment_date'),
			'inv_no' => $this->input->post('inv_no'),
			'bkm_no' => $this->input->post('bkm_no'),
			'sale_id' => $sale_id,
		];

		return $data;
	}

	/**
	 * get where payment confirmation
	 * @return boolean
	 */
	public function get_where($where) {
		$this->db->where($where);
		$query = $this->db->get('sale_payment_conf');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	/**
	 * insert payment_confimation
	 * @param $input
	 * @return bool
	 */
	public function insert($sale_id, $input, $img = NULL) {
		$data = $this->set_input($sale_id, $input);
		$data['img'] = $img;
		return $this->db->insert('sale_payment_conf', $data);
	}
	
	public function upload_img() {
		$config['file_name'] 			= $this->input->post('bkm_no');
		$config['overwrite']			= TRUE;
		$config['upload_path']    = './uploads/payment/img/';
		$config['allowed_types'] 	= 'gif|jpg|jpeg|png';
		$config['max_size']  			= '100';
		$config['max_width']  		= '1024';
		$config['max_height']  		= '768';
		$this->load->library('upload', $config);
    
    if (!$this->upload->do_upload('img')){
    	$this->session->set_flashdata('err', $this->upload->display_errors());
    	return false;
    } else {
    	return $this->upload->data();
    }
	}

}

/* End of file Payment_model.php */
/* Location: ./application/models/Payment_model.php */
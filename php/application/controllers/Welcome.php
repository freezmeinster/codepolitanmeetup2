<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Ripcord\Ripcord;

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$common = Ripcord::xmlrpcClient($this->config->item("odoo_url_common"));
		$models = Ripcord::xmlrpcClient($this->config->item("odoo_url_object"));
		$uid = 1;
		$db = $this->config->item("odoo_database");
		$password = $this->config->item("odoo_password");
		$version = $common->version();
		
		$data['version'] = $version;
		
		$invoice = $models->execute_kw($db, $uid, $password, 'laundryku.sales', 'search_read', []);
		$data["invoice"] = $invoice;
		$this->load->view('welcome_message', $data);
	}
}

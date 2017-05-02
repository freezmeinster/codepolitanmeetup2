<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Ripcord\Ripcord;

class Invoice extends CI_Controller {
    
	public function view($id)
	{
        $models = Ripcord::xmlrpcClient($this->config->item("odoo_url_object"));
		$uid = 1;
		$db = $this->config->item("odoo_database");
		$password = $this->config->item("odoo_password");
        
        $invoice = $models->execute_kw($db, $uid, $password,
            'laundryku.sales', 'read', array(array((int)$id)));
        
        $invoice_line = $models->execute_kw($db, $uid, $password,
            'laundryku.sales_line', 'read', array($invoice[0]['sales_lines']));
        
        $line = null;
        
        foreach($invoice_line as $lines){
            $line[$lines['id']] = $lines; 
        }
        
		$data["invoice"] = $invoice;
        $data['lines'] = $line;
		$this->load->view('invoice_view', $data);
    }
    
    public function action($action, $id)
	{
        $models = Ripcord::xmlrpcClient($this->config->item("odoo_url_object"));
		$uid = 1;
		$db = $this->config->item("odoo_database");
		$password = $this->config->item("odoo_password");

        
        $models->execute_kw($db, $uid, $password,
            'laundryku.sales', $action, array(array((int)$id)));
        
        redirect("http://localhost:8000/invoice/view/".$id);
    }
}
<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Invoice Class
 *
 * Keeps track of client invoices with crud.
 *
 * @license 	MIT Licence
 * @category	Controllers
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		27 Jul 2009
 */
class Invoice_Controller extends Core_Controller
{
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		// Check if cached and cache if its not
		if (!$invoice_client = $this->cache->get('invoice')) {
			$invoices = ORM::factory('invoice');
			
			$invoice_client = array();
			foreach ($invoices->find_all() as $invoice) {
				$invoice_client[$invoice->id] = array();
				
				$invoice_client[$invoice->id] = $invoice->as_array();
				$invoice_client[$invoice->id]['item'] = array();
				/*foreach ($invoice->items as $item) {
					array_push($invoice_client[$invoice->id]['item'], $item->as_array());
				}*/
			}
			
			// Save cache and give it a tag
			$tags = array('clients', 'invoice');
			$this->cache->set('invoice', $invoice_client, $tags);
		}
		
		$this->template->content = new View('invoices/index');
		$this->template->content->invoices = $invoice_client;
	}
	
	public function add() {
		$clients = $this->cache->get('client') ? $this->cache->get('client') : ORM::factory('client')->find_all_as_array();
		
		// $client_list = array();
		foreach ($clients as $client) {
			$client_list[$client['id']] = $client['company'];
		}
		
		$form = Formo::factory('invoice_add')->set('class', 'smart-form')
						->add('invoice_no', array('class'=>'size', 'label'=>'Invoice No'))
						->add_select('client', $client_list, array('class'=>'size'))
						->add_textarea('notes', array('class'=>'size'))
						->add('address1', array('class'=>'size', 'required'=>FALSE))
						->add('url', array('label'=>'Website', 'class'=>'size', 'required'=>FALSE))
						->add('submit', 'Submit');
		
		if($form->validate()){
			
			$client = ORM::factory('Client');
			$client->company = $form->company->value;
			$client->address = $form->address->value;
			$client->address1 = $form->address1->value;
			$client->city = $form->city->value;
			$client->postcode = $form->postcode->value;
			$client->phone = $form->phone->value;
			$client->fax = $form->fax->value;
			$client->url = $form->url->value;
			
			($client->save() AND $this->cache->delete_tag('clients') AND url::redirect('client'));
		}
		
		$this->template->content = new View('invoices/add');
		$this->template->content->form = $form;
	}
}
/* End of file invoice.php */
/* Location: /cygdrive/c/projects/dev/bc/application/controllers/invoice.php */
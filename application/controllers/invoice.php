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
}
/* End of file invoice.php */
/* Location: /cygdrive/c/projects/dev/bc/application/controllers/invoice.php */
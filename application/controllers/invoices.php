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
class Invoices_Controller extends Core_Controller
{
	public function __construct() {
        parent::__construct();
        $this->template->page_title = __('Invoices');

        $clients = $this->cache->get('client') ? $this->cache->get('client') : ORM::factory('client')->find_all_as_array();
        foreach ($clients as $client) {
            $client_list[$client['id']] = $client['company'];
        }

        $this->template->sidebar = array(
            'hooks/sidebar/newinvoices'=>array('clients'=>$client_list),
            'hooks/sidebar/standard'=>'');
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
	
	public function add($client = NULL) {
        $client_id = $this->input->post('client') ? $this->input->post('client') : $client;
        if($client_id == '' AND $client_id != '-') url::redirect('clients/new?client=' . urlencode($this->input->post('client_new')));
        
        $invoices = ORM::factory('invoice');
        $clients = $this->cache->get('client') ? $this->cache->get('client') : ORM::factory('client')->find_all_as_array();

        // $client_list = array();
        foreach ($clients as $client) {
            $client_list[$client['id']] = $client['company'];
        }
        
        $data = array('hour', 'day', 'service', 'product');

        $form = Formo::factory('invoice_add')->set('class', 'simple-form')
                                    ->add('invoice_id', array('class'=>'size', 'label'=>'Invoice ID'))
                                    ->add('po_number', array('class'=>'size', 'label'=>'P.O. Number', 'required'=>FALSE))
                                    ->add_select('client', $client_list, array('class'=>'size', 'value'=>$client_id))
                                    ->add_textarea('notes', array('class'=>'size', 'required'=>FALSE))
                                    
                                    ->add('qty', array('class'=>'qty'))
                                    ->add_select('type', $data)
                                    ->add_textarea('description')
                                    ->add('unit_price', array('class'=>'qty'))
                                    
                                    ->add('submit', 'Submit');

        if($form->validate()){
        	// echo Kohana::debug($form); die;

            $invoice = ORM::factory('invoice');
            $invoice->invoice_no = $form->invoice_id->value;
            $invoice->po_number = $form->po_number->value;
            $invoice->client_id = $form->client->value;
            $invoice->notes = $form->notes->value;
            $invoice->save();
            
            $item = ORM::factory('item');
            $item->qty = $form->qty->value;
            $item->description = $form->description->value;
            $item->unit_price = $form->unit_price->value;
            $item->type = $form->type->value;
            $item->invoice_id = $invoice->id;

            ($item->save() AND $this->cache->delete_tag('clients'));
            url::redirect('invoices');
        }

        $this->template->content = new View('invoices/add', $form->get(TRUE));
        $this->template->content->client_name = $client_list[$client_id];
        $this->template->content->item_view = new View('invoices/items', $form->get(TRUE));
	}
}
/* End of file invoice.php */
/* Location: /cygdrive/c/projects/dev/bc/application/controllers/invoice.php */
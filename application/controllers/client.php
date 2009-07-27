<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Client Class
 *
 * Handles all client operation for application
 *
 * @license 	MIT Licence
 * @category	Controllers
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		22 Jul 2009
 */
class Client_Controller extends Core_Controller
{
	public function __construct() {
		parent::__construct();
		new Profiler;
	}
	
	public function index() {
		// Check if cached and cache if its not
		if (!$client_contact = $this->cache->get('client')) {
			$clients = ORM::factory('client');
			
			$client_contact = array();
			foreach ($clients->find_all() as $client) {
				$client_contact[$client->id] = array();
				
				$client_contact[$client->id] = $client->as_array();
				$client_contact[$client->id]['contact'] = array();
				foreach ($client->contacts as $contact) {
					array_push($client_contact[$client->id]['contact'], $contact->as_array());
				}
			}
			
			// Save cache and give it a tag
			$tags = array('clients', 'contacts');
			$this->cache->set('client', $client_contact, $tags);
		}
		
		$this->template->content = new View('clients/index');
		$this->template->content->clients = $client_contact;
	}
	
	public function add() {
		$form = Formo::factory('client_add')->set('class', 'smart-form')
						->add('company', array('class'=>'size'))
						->add('address', array('class'=>'size'))
						->add('address1', array('class'=>'size', 'required'=>FALSE))
						->add('city', array('class'=>'size'))
						->add('postcode', array('class'=>'size'))
						->add('phone', array('class'=>'size'))
						->add('fax', array('class'=>'size', 'required'=>FALSE))
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
		
		$this->template->content = new View('clients/add');
		$this->template->content->form = $form;
	}
	
	public function edit($id) {
		$client = ORM::factory('Client', (int) $id);
		$form = Formo::factory('client_edit')->set('class', 'smart-form')
						->add('company', array('class'=>'size', 'value'=>$client->company))
						->add('address', array('class'=>'size', 'value'=>$client->address))
						->add('address1', array('class'=>'size', 'value'=>$client->address1, 'required'=>FALSE))
						->add('city', array('class'=>'size', 'value'=>$client->city))
						->add('postcode', array('class'=>'size', 'value'=>$client->postcode))
						->add('phone', array('class'=>'size', 'value'=>$client->phone))
						->add('fax', array('class'=>'size', 'value'=>$client->fax, 'required'=>FALSE))
						->add('url', array('label'=>'Website', 'class'=>'size', 'value'=>$client->url, 'required'=>FALSE))
						->add('submit', 'Submit');
		
		if($form->validate()){
			
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
		
		$this->template->content = new View('clients/add');
		$this->template->content->form = $form;
	}
}
/* End of file client.php */
/* Location: /cygdrive/c/projects/dev/bc/application/controllers/client.php */
<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Contact Class
 *
 * Contacts for the clients
 *
 * @license 	MIT Licence
 * @category	Controllers
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		24 Jul 2009
 */
class Contact_Controller extends Core_Controller
{
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		
	}
	
	public function add($client_id) {
		$client = ORM::factory('client', $client_id);
		
		if ($client->id === '') {
			$this->session->set_flash('client', 'There is no client associated with the id provided.');
			url::redirect();
		}
		
		$form = Formo::factory('contact_add')->set('class', 'smart-form')
						->add('first', array('class'=>'size'))
						->add('last', array('class'=>'size'))
						->add('email', array('class'=>'size'))
						->add('phone', array('class'=>'size'))
						->add('mobile', array('class'=>'size'))
						->add('submit', 'Submit');
		
		if($form->validate()){
			
			$contact = ORM::factory('contact');
			$contact->client_id = $client->id;
			$contact->first = $form->first->value;
			$contact->last = $form->last->value;
			$contact->email = $form->email->value;
			$contact->phone = $form->phone->value;
			$contact->mobile = $form->mobile->value;
			
			($contact->save() AND $this->cache->delete_tag('contacts') AND url::redirect('client'));
		}
		
		$this->template->content = new View('contacts/add');
		$this->template->content->form = $form;
	}
}
/* End of file contact.php */
/* Location: /cygdrive/c/projects/dev/bc/application/controllers/contact.php */
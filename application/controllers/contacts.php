<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Contacts Class
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
class Contacts_Controller extends Core_Controller
{
	public function __construct() {
        parent::__construct();
        $this->template->page_title = __('Contacts');
        new Profiler;
	}
	
	public function index() {
		
	}
	
	public function add($client_id) {
        $client = ORM::factory('client', $client_id);

        if ($client->id == '') {
                $this->session->set_flash('client', 'There is no client associated with the id provided.');
                url::redirect();
        }

        $form = Formo::factory('contact_add')->set('class', 'smart-form')
                ->add('first', array('class'=>'size'))
                ->add('last', array('class'=>'size'))
                ->add('email', array('class'=>'size'))
                ->add('phone', array('class'=>'size'))
                ->add('mobile', array('class'=>'size', 'required'=>FALSE))
                ->add('submit', 'Submit');

        if($form->validate()){

            $contact = ORM::factory('contact');
            $contact->client_id = $client->id;
            $contact->first = $form->first->value;
            $contact->last = $form->last->value;
            $contact->email = $form->email->value;
            $contact->phone = $form->phone->value;
            $contact->mobile = $form->mobile->value;

            ($contact->save() AND $this->cache->delete_tag('contacts') AND url::redirect('clients'));
        }

        $this->template->content = new View('contacts/add');
        $this->template->content->form = $form;
	}
	
	public function edit($id) {
        $contact = ORM::factory('contact', $id);

        if ($contact->id == '') {
            $this->session->set_flash('contact', 'There is no contact associated with the id provided.');
            url::redirect();
        }

        $form = Formo::factory('contact_edit')->set('class', 'smart-form')
                ->add('first', array('class'=>'size', 'value'=>$contact->first))
                ->add('last', array('class'=>'size', 'value'=>$contact->last))
                ->add('email', array('class'=>'size', 'value'=>$contact->email))
                ->add('phone', array('class'=>'size', 'value'=>$contact->phone))
                ->add('mobile', array('class'=>'size', 'value'=>$contact->mobile))
                ->add('submit', __('Submit'));

        if($form->validate()){
            // $contact->id = $client->id;
            $contact->first = $form->first->value;
            $contact->last = $form->last->value;
            $contact->email = $form->email->value;
            $contact->phone = $form->phone->value;
            $contact->mobile = $form->mobile->value;

            ($contact->save() AND $this->cache->delete_tag('contacts') AND url::redirect('clients'));
        }

        $this->template->content = new View('contacts/add');
        $this->template->content->form = $form;
	}
	
	public function delete($id)
	{
		
	}
	
	public function change_client($id = NULL) {
        $contact = ORM::factory('contact', $id);

        if ($contact->id == '') {
            $this->session->set_flash('contact', 'There is no contact associated with the id provided.');
            url::redirect();
        }

        $clients = $this->cache->get('client') ? $this->cache->get('client') : ORM::factory('client')->find_all_as_array();

        // $client_list = array();
        foreach ($clients as $client) {
            $client_list[$client['id']] = $client['company'];
        }

        $form = Formo::factory('contact_edit')->set('class', 'smart-form')
                                    ->add_select('client', $client_list, array('value' => $contact->client_id))
                                    ->add('submit', 'Submit');

        if($form->validate()){
            $contact->client_id = $form->client->value;

            ($contact->save() AND $this->cache->delete_tag('contacts') AND url::redirect('clients'));
        }

        $this->template->content = new View('contacts/add');
        $this->template->content->form = $form;
	}
}
/* End of file contact.php */
/* Location: /cygdrive/c/projects/dev/bc/application/controllers/contact.php */
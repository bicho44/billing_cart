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
		$this->cache = Cache::instance();
		
		if (!$client_contact = $this->cache->get('client')) {
			$clients = ORM::factory('client');
			
			$client_contact = array();
			foreach ($clients->find_all() as $client) {
				$client_contact['client'][$client->id] = $client;
				// $client_contact['contact'][$client->id] = $clients->find($client->id)->contacts;
				foreach ($clients->find($client->id)->contacts as $key => $value) {
					$client_contact['contact'][$client->id] = $value;
				}
			}
			
			// $this->cache->set('client', $client_contact, 'client_cache_db');
		}
		
		$this->template->content = new View('clients/index');
		$this->template->content->clients = $client_contact;
	}
}
/* End of file client.php */
/* Location: /cygdrive/c/projects/dev/bc/application/controllers/client.php */
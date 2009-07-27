<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Client Model
 *
 * Handles all database transaction to do with the clients table
 *
 * @license 	MIT Licence
 * @category	Models
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		22 Jul 2009
 */
class Client_Model extends ORM
{
	// Relationships
	protected $has_many = array('invoices', 'contacts');
	
	public function find_all_as_array() {
		foreach ($this->find_all() as $fields) {
			$field_array[] = $fields->as_array();
		}
		
		return $field_array;
	}
	
	public function contacts() {
		$query = Database::instance()->from('clients')->join('contacts', 'contacts.client_id', 'clients.id')->get();
		return $query->result(FALSE);
	}
}
/* End of file client.php */
/* Location: /cygdrive/c/projects/dev/bc/application/models/client.php */
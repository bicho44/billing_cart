<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Item Model
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
class Item_Model extends ORM
{
	// Relationships
	protected $belongs_to = array('invoice');
	
	public function find_all_as_array() {
		foreach ($this->find_all() as $fields) {
			$field_array[] = $fields->as_array();
		}
		
		return $field_array;
	}
}
/* End of file item.php */
/* Location: ./application/models/item.php */
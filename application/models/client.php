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
}
/* End of file client.php */
/* Location: /cygdrive/c/projects/dev/bc/application/models/client.php */
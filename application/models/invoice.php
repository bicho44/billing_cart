<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Invoice Model
 *
 * Handles all database transaction to do with the clients table
 *
 * @license 	MIT Licence
 * @category	Models
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		27 Jul 2009
 */
class Invoice_Model extends ORM
{
	// Relationships
	protected $belongs_to = array('clients');
	protected $has_many = array('items');
}
/* End of file invoice.php */
/* Location: /cygdrive/c/projects/dev/bc/application/models/invoice.php */
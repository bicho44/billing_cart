<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Contact Model
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
class Contact_Model extends ORM
{
	// Relationships
	protected $belongs_to = array('clients');
}
/* End of file contact.php */
/* Location: /cygdrive/c/projects/dev/bc/application/models/contact.php */
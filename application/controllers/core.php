<?php <?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Core
 *
 * Controls the CMS Authorization and Authentication.
 *
 * @license 	MIT Licence
 * @category	Helpers
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		20 Jul 2009
 */
abstract class Core_Controller extends Template_Controller
{
	public function __construct(){
		parent::__construct();
		
		$this->auth = Auth::factory();
	}
}
/* End of file core.php */
/* Location: /cygdrive/e/learn/bc/application/controllers/core.php */
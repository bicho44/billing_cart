<?php defined('SYSPATH') OR die('No direct access allowed.');
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
	// Define Template Controller View
	public $template = 'master/clean';
	
	public function __construct(){
		parent::__construct();
		
		$this->auth = Auth::instance();
		
		if(!$this->auth->logged_in('login')){
			url::redirect('login');
			exit();
		}
		
		$this->template->app_name = "Billing Cart";
	}
}
/* End of file core.php */
/* Location: /cygdrive/e/learn/bc/application/controllers/core.php */
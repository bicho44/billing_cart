<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Core
 *
 * Controls the Application Authorization and Authentication.
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
		
		// Load Instance of auth module
		$this->auth = Auth::instance();
		
		if(!$this->auth->logged_in('login')){
			url::redirect('login');
			exit();
		}
		
		// Load Instance of session library
		$this->session = Session::instance();
		
		// Instance Cache
		$this->cache = Cache::instance();
		
		$this->template->app_name = Kohana::config('bc.bc');
	}
}
/* End of file core.php */
/* Location: ./application/controllers/core.php */
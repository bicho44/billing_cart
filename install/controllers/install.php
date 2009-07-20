<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Install
 *
 * Installation controller for Application
 *
 * @license 	MIT Licence
 * @category	Controller
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		20 Jul 2009
 */
class Install_Controller extends Template_Controller
{
	public $template = 'install/master';
	
	public function __construct(){
		parent::__construct();
		
		$this->template->app_name = "Billing Cart";
	}
	
	public function index()
	{
		$this->template->title = 'System Check';
		
		$view = new View('install/system_check');

		$view->php_version           = version_compare(PHP_VERSION, '5.2', '>=');
		$view->system_directory      = (is_dir(SYSPATH) AND is_file(SYSPATH.'core/Bootstrap'.EXT));
		$view->application_directory = (is_dir(APPPATH) AND is_file(DOCROOT.'application/config/config'.EXT));
		$view->modules_directory     = is_dir(MODPATH);
		$view->config_writable       = (is_dir(DOCROOT.'config') AND is_writable(DOCROOT.'config'));
		$view->cache_writable        = (is_dir(DOCROOT.'config/cache') AND is_writable(DOCROOT.'config/cache'));
		$view->pcre_utf8             = @preg_match('/^.$/u', 'ñ');
		$view->pcre_unicode          = @preg_match('/^\pL$/u', 'ñ');
		$view->reflection_enabled    = class_exists('ReflectionClass');
		$view->filters_enabled       = function_exists('filter_list');
		$view->iconv_loaded          = extension_loaded('iconv');
		$view->mbstring              = ( ! (extension_loaded('mbstring') AND ini_get('mbstring.func_overload') AND MB_OVERLOAD_STRING));
		$view->uri_determination     = isset($_SERVER['REQUEST_URI']) OR isset($_SERVER['PHP_SELF']);

		if ($view->php_version
			AND $view->system_directory
			AND $view->application_directory
			AND $view->modules_directory
			AND $view->config_writable
			AND $view->cache_writable
			AND $view->pcre_utf8
			AND $view->pcre_unicode
			AND $view->reflection_enabled
			AND $view->filters_enabled
			AND $view->iconv_loaded
			AND $view->mbstring
			AND $view->uri_determination)
			url::redirect('install/database_setup');
		else
		{
			$this->error = 'S7Ncms may not work correctly with your environment.';
		}

		$this->template->content = $view;
	}
	
	public function database_setup()
	{
		$this->template->content = new View('install/database_setup');
	}
}
/* End of file install.php */
/* Location: /cygdrive/e/learn/bc/install/controllers/install.php */
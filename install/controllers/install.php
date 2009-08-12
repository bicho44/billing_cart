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
	
	public function __construct() {
		parent::__construct();
		
		$this->template->app_name = "Billing Cart";
		$this->template->bind('error', $this->error);
	}
	
	public function index() {
		$this->template->page_title = 'System Check';
		
		$view = new View('install/system_check');

		$view->php_version           = version_compare(PHP_VERSION, '5.2', '>=');
		$view->system_directory      = (is_dir(SYSPATH) AND is_file(SYSPATH.'core/Bootstrap'.EXT));
		$view->application_directory = (is_dir(APPPATH) AND is_file(DOCROOT.'application/config/config'.EXT));
		$view->modules_directory     = is_dir(MODPATH);
		$view->config_writable       = (is_dir(DOCROOT.'application/config') AND is_writable(DOCROOT.'application/config'));
		$view->cache_writable        = (is_dir(DOCROOT.'application/cache') AND is_writable(DOCROOT.'application/cache'));
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
				$view->hi = 'hello';
			// url::redirect('install/database_setup');
		else
		{
			$this->error = 'Billing Cart may not work correctly with your environment.';
		}

		$this->template->content = $view;
	}
	
	public function database_setup() {
		$form = Formo::factory('database_setup')->set('class', 'smart-form')
						->add('host', array('class'=>'size'))
						->add('username', array('class'=>'size'))
						->add('password', array('class'=>'size', 'required'=>FALSE))->type('password')
						->add('database', array('class'=>'size'))
						->add('prefix', array('class'=>'size', 'value'=>'bc_'))
						->add('checkbox', 'drop', array('label'=>'Drop Tables', 'required'=>FALSE))
						->add('checkbox', 'data', array('label'=>'Insert Data', 'required'=>FALSE))
						->add('submit', 'submit', array('value'=>'Install', 'class'=>'submit'));		
		
		if($form->validate()) {
			
			try
			{
				setup::check_db($form->username->value, $form->password->value, $form->host->value, $form->database->value);
				
				$data = array(
						'username'=>$form->username->value,
						'password'=>$form->password->value,
						'host'=>$form->host->value,
						'database'=>$form->database->value,
						'prefix'=>$form->prefix->value,
						'data'=>$form->data->checked
						);
				
				Session::instance()->set('database_data', $data);
				
				$redirect = $form->drop->checked ? 'install/step_drop_tables' : 'install/step_create_structure';

				url::redirect($redirect);
			}
			catch (Exception $e)
			{
				$error = $e->getMessage();

				// TODO create better error messages
				switch ($error)
				{
					case 'access':
						$this->error = 'wrong username or password';
						break;
					case 'unknown_host':
						$this->error = 'could not find the host';
						break;
					case 'connect_to_host':
						$this->error = 'could not connect to host';
						break;
					case 'select':
						$this->error = 'could not select the database';
						break;
					default:
						$this->error = $error;
				}
			}
		}
		
		$this->template->page_title = 'Database Setup';
		
		$this->template->content = new View('install/database_setup');
		$this->template->content->form = $form;
	}
	
	public function step_drop_tables() {
		$data = Session::instance()->get('database_data');
		
		$sql = View::factory('install/sql_drop_tables', array('table_prefix' => $data['prefix']))->render();
		$sql = explode("\n", $sql);
		
		$conn = @mysql_connect($data["host"], $data["username"], $data["password"]);
		$db = mysql_select_db($data["database"], $conn);
		
		if (!$db) die ('Can\'t use '. $data["database"] .' : ' . mysql_error());
		
		$buffer = '';
		foreach ($sql as $line) {
			$buffer .= $line;
			if (preg_match('/;$/', $line)) {
				mysql_query($buffer);
				
				$buffer = '';
			}
			
		}
		url::redirect('install/step_create_structure');
	}
	
	public function step_create_structure() {
		$data = Session::instance()->get('database_data');
		
		$sql = View::factory('install/sql_tables', array('table_prefix' => $data['prefix']))->render();
		$sql = explode("\n", $sql);
		
		$conn = @mysql_connect($data["host"], $data["username"], $data["password"]);
		$db = mysql_select_db($data["database"], $conn);
		
		if (!$db) die ('Can\'t use '. $data["database"] .' : ' . mysql_error());
		
		$buffer = '';
		foreach ($sql as $line) {
			$buffer .= $line;
			if (preg_match('/;$/', $line)) {
				mysql_query($buffer);
				
				$buffer = '';
			}
			
		}
		$redirect = $data['data'] ? 'install/step_create_data' : 'install/create_db';
		
		url::redirect($redirect);
	}
	
	public function step_create_data() {
		$data = Session::instance()->get('database_data');
		
		$sql = View::factory('install/sql_data', array('table_prefix' => $data['prefix']))->render();
		$sql = explode("\n", $sql);
		
		$conn = @mysql_connect($data["host"], $data["username"], $data["password"]);
		$db = mysql_select_db($data["database"], $conn);
		
		if (!$db) die ('Can\'t use '. $data["database"] .' : ' . mysql_error());
		
		$buffer = '';
		foreach ($sql as $line)
		{
			$buffer .= $line;
			if (preg_match('/;$/', $line))
			{
				mysql_query($buffer);
				
				$buffer = '';
			}
			
		}
		url::redirect('install/create_db');
	}
	
	public function create_db() {
		$this->template->page_title = 'Creating Database Tables';
		
		$data = Session::instance()->get('database_data');
		
		if ($data !== NULL) {
			if(setup::create_database_config($data)) {
				url::redirect('install/complete');
			}
			$this->error = 'unable to write database.php file';
		}
		
		$this->template->content = View::factory('install/complete');
	}
	
	public function complete() {
		$this->template->page_title = 'Setup Complete';
		
		Session::instance()->destroy();
		
		$this->template->content = View::factory('install/complete');
	}
}
/* End of file install.php */
/* Location: ./install/controllers/install.php */
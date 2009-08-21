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
	public function __construct() {
		parent::__construct();
		$this->template->app_name = Kohana::config('bc.bc');
		$this->template->version = Kohana::config('bc.version');
	}
	
	/*
		TODO: Change main index to language selector in future release
		
		public function index() {
			$this->template->page_title = __('Please select your prefered language');
			
			$this->template->content = View::factory('install/language');
		}
	*/
	
	
	public function index() {
		$this->template->page_title = __('System Check');
		
		$view = new View('install/system_check');
		
		$view->php_version           = version_compare(PHP_VERSION, '5.2', '>=');
		$view->system_directory      = (is_dir(SYSPATH) AND is_file(SYSPATH.'core/Bootstrap'.EXT));
		$view->application_directory = (is_dir(APPPATH) AND is_file(DOCROOT.'application/config/config'.EXT));
		$view->modules_directory     = (is_dir(MODPATH) AND file_exists(DOCROOT.'application/modules'));
		$view->config_writable       = (is_dir(DOCROOT.'application/config') AND is_writable(DOCROOT.'application/config'));
		$view->cache_writable        = (is_dir(DOCROOT.'application/cache') AND is_writable(DOCROOT.'application/cache'));
		$view->pcre_utf8             = @preg_match('/^.$/u', 'ñ');
		$view->pcre_unicode          = @preg_match('/^\pL$/u', 'ñ');
		$view->reflection_enabled    = class_exists('ReflectionClass');
		$view->filters_enabled       = function_exists('filter_list');
		$view->iconv_loaded          = extension_loaded('iconv');
		$view->mbstring              = ( ! (extension_loaded('mbstring') AND ini_get('mbstring.func_overload') AND MB_OVERLOAD_STRING));
		$view->uri_determination     = isset($_SERVER['REQUEST_URI']) OR isset($_SERVER['PHP_SELF']);
		
		$view->config_dir = str_replace('\\', '/', DOCROOT.'application/config').'/';
		$view->cache_dir = str_replace('\\', '/', DOCROOT.'application/cache').'/';

		if ($view->php_version AND $view->system_directory AND $view->application_directory AND $view->modules_directory
			AND $view->config_writable AND $view->cache_writable AND $view->pcre_utf8 AND $view->pcre_unicode AND $view->reflection_enabled
			AND $view->filters_enabled AND $view->iconv_loaded AND $view->mbstring AND $view->uri_determination) {
			$view->success = __('%bc will work correctly with your environment', array('%bc' => Kohana::config('bc.bc')));
		} else {
			$view->error = __('%bc may not work correctly with your environment, issues are listed below', array('%bc' => Kohana::config('bc.bc')));
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
						->add('submit', 'submit', array('value'=>__('Install'), 'class'=>'button'));		
		
		if($form->validate()) {
			try {
				setup::check_db($form->username->value, $form->password->value, $form->host->value, $form->database->value, $form->prefix->value);
				
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
			} catch (Exception $e) {
				$error = $e->getMessage();
				Session::instance()->delete('conn_status');
				switch ($error)
				{
					case 'access':
						$conn_error = __('Wrong username or password.');
						break;
					case 'unknown_host':
						$conn_error = __('Could not find the host.');
						break;
					case 'connect_to_host':
						$conn_error = __('Could not connect to host.');
						break;
					case 'create':
						$conn_error = __('Could not create the database.');
						break;
					case 'select':
						$conn_error = __('Could not select the database.');
						break;
					case 'prefix':
						$conn_error = __('The Table Prefix you chose is already in use.');
						break;
					default:
						$conn_error = $error;
				}
			}
		}
		
		$this->template->page_title = __('Database Setup');
		
		$data = $form->get(TRUE);
		$this->template->content = new View('install/database_setup', $data);
		$this->template->content->success = __('%bc will work correctly with your environment', array('%bc' => Kohana::config('bc.bc')));
		$this->template->content->error = isset($conn_error) ? $conn_error : '';
		$this->template->content->passed = Session::instance()->get('conn_status');
	}
	
	public function ajax_db_check() {
		if (request::is_ajax()) {
		    $this->auto_render = FALSE;
		} else {
			return Event::run('system.404');
		}
		
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		$host = isset($_POST['host']) ? $_POST['host'] : '';
		$database = isset($_POST['database']) ? $_POST['database'] : '';
		$prefix = isset($_POST['prefix']) ? $_POST['prefix'] : '';
		
		Session::instance()->delete('conn_status');
		
		try {
			setup::check_db($username, $password, $host, $database, $prefix);
			
			Session::instance()->set('conn_status', 'pass');
			echo __('true:Connection was successful and database was created');
		} catch (Exception $e) {
			$error = $e->getMessage();
			
			switch ($error)
			{
				case 'access':
					echo __('Wrong username or password.');
					break;
				case 'unknown_host':
					echo __('Could not find the host.');
					break;
				case 'connect_to_host':
					echo __('Could not connect to host.');
					break;
				case 'create':
					echo __('Could not create the database.');
					break;
				case 'select':
					echo __('Could not select the database.');
					break;
				case 'prefix':
					echo __('The Table Prefix you chose is already in use.');
					break;
				default:
					echo $error;
			}
		}
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
		url::redirect('install/save_config');
	}
	
	public function save_config() {
		$this->template->page_title = __('Saving Database Configuration File');
		
		$data = Session::instance()->get('database_data');
		
		if ($data !== NULL) {
			if(setup::create_database_config($data)) {
				url::redirect('install/complete');
			}
			$error = __('Unable to write database.php config file');
		}
		
		$this->template->content = View::factory('install/save_config');
		$this->template->content->error = isset($error) ? $error : '';
	}
	
	public function complete() {
		$this->template->page_title = __('Complete');
		
		Session::instance()->destroy();
		
		$this->template->content = View::factory('install/complete');
	}
}
/* End of file install.php */
/* Location: ./installer/controllers/install.php */
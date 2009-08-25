<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Login
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
class Login_Controller extends Template_Controller
{
	// Define Template Controller View
	public $template = 'login';
	
	public function __construct(){
		parent::__construct();
		
		$this->auth = Auth::instance();
		
		$this->template->app_name = Kohana::config('bc.bc');
		$this->template->page_title = __('Login');
	}
	
	public function index(){
		// If remember me is set the autologin
		if ($this->auth->auto_login() || $this->auth->logged_in()) {
			url::redirect('dashboard');
		}
		
		$form = Formo::factory('login')->set('class', 'smart-form')
						->add('username', array('class'=>'size hasDefault'))
						->add('password', array('class'=>'size hasDefault'))->type('password')
						->add('submit', 'Submit');
		
		if($form->validate()){
			// Remember me check
			$remember = isset($form->remember_me) ? TRUE : FALSE;
			
			// Load the user
			$user = ORM::factory('user', $form->username->value);

			// Attempt a login
			if ($this->auth->login($user, $form->password->value, $remember))
			{
				url::redirect('dashboard');
			}
		}
		
		$this->template->content = new View('login/index', $form->get(TRUE));
	}
	
	public function logout() {
		if ($this->auth->logout()) {
			url::redirect('login');
		}
	}
	
	public function create() {
		$this->template->content = new View('users/create');
		
		$form = new Validation($_POST);
		$form->pre_filter('trim', true);
		
		$form->add_rules('username', 'required')
			 ->add_rules('password', 'required')
			 ->add_rules('email', 'required', 'valid::email');
		
		$this->template->content->repopulate = $form;
		
		if ($form->validate())
		{
			// Create new user
			$user = new User_Model;

			if (!$user->username_exists($this->input->post('username')))
			{
				foreach ($form->as_array() as $key => $val)
				{
					// Set user data
					$user->$key = $val;
				}
				
				if($user->validate($form->as_array())){
					if ($user->add(ORM::factory('role','login')) AND $user->save())
					{
						// Redirect to the login page
						url::redirect('login');
					}
				}
			}
		}
		
		// Error
		$this->template->content->error = $form->errors('login');
	}
}
/* End of file login.php */
/* Location: /cygdrive/e/learn/bc/application/controllers/login.php */
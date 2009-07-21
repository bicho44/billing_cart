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
class Login_Controller extends Core_Controller
{
	// Define Template Controller View
	public $template = 'master/clean';
	
	public function __construct(){
		parent::__construct();
		$this->template->page_title = Kohana::lang('login.page_title');
	}
	
	public function index(){
		$this->template->content = new View('login/index');
		
		$form = new Validation($_POST);
		$form->pre_filter('trim', true);
		
		$form->add_rules('username', 'required')
			 ->add_rules('password', 'required');
		
		$this->template->content->repopulate = $form;
			 
		if ($form->validate()) {
			// Load the user
			$user = ORM::factory('user', $form->username);

			// Attempt a login
			if ($this->auth->login($user, $form->password))
			{
				echo '<h4>Login Success!</h4>';
				echo '<p>Your roles are:</p>';
				echo Kohana::debug($user->roles);
				return;
			}
		}
		
		// Error
		$this->template->content->error = $form->errors('login');
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
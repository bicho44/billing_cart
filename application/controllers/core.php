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

        global $tab;
        $tab = array(
                    array('id'=>1,'cssid'=>'dashboard','title'=>__('Dashboard'),'slug'=>'dashboard','parent_id'=>0,'align'=>'left'),
                    array('id'=>2,'cssid'=>'invoices','title'=>__('Invoices'),'slug'=>'invoices','parent_id'=>0,'align'=>'left'),
                    array('id'=>3,'cssid'=>'clients','title'=>__('Clients'),'slug'=>'clients','parent_id'=>0,'align'=>'left'),
                    array('id'=>4,'cssid'=>'settings','title'=>__('Settings'),'slug'=>'settings','parent_id'=>0,'align'=>'right'),
                    );
        
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
        $this->template->sidebar = '';
    }
}
/* End of file core.php */
/* Location: ./application/controllers/core.php */
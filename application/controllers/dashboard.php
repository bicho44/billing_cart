<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Dashboard Class
 *
 * Shows summary of all features in application
 *
 * @license 	MIT Licence
 * @category	Controllers
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		21 Jul 2009
 */
class Dashboard_Controller extends Core_Controller
{
	public function __construct() {
        parent::__construct();
        $this->template->page_title = __('Dashboard');
        
        $clients = $this->cache->get('client') ? $this->cache->get('client') : ORM::factory('client')->find_all_as_array();
        foreach ($clients as $client) {
            $client_list[$client['id']] = $client['company'];
        }
        
        $this->template->sidebar = array(
            'hooks/sidebar/newinvoices'=>array('clients'=>$client_list),
            'hooks/sidebar/standard'=>'');
	}
	
	public function index() {
        $this->template->content = new View('dashboard/index');
        $this->template->content->username = $this->auth->get_user()->username;
	}
}
/* End of file dashboard.php */
/* Location: /cygdrive/c/projects/dev/bc/application/controllers/dashboard.php */
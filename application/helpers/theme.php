<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Theme Class
 *
 * Theming functionality of Billing Cart is loaded in here, this gets
 * called on system startup in a hook called bc.php.
 *
 * @license 	MIT Licence
 * @category	Helpers
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		27 May 2009
 */
class theme_Core 
{
	public static $name = 'remember_me';
	
	static function load_themes()
	{
		$modules = Kohana::config("core.modules");
		array_unshift($modules, THEMEPATH);
		Kohana::config_set("core.modules", $modules);
		
		theme::$name = Kohana::config('bc.theme');
		
		if (strpos(Router::$current_uri, 'admin') === 0)
			theme::$name = 'admin';
	}

    public function nav($selectedclass = 'current') {
        global $tab;
        $pages = $tab;

        // Initialize variables
        $navi = array();
        $i = 1;

        foreach($pages as $index => $page) {
                // Full Url
                $full_url = url::site($page['slug']);

                $navi[$index]['id'] = $page['id'];
                $navi[$index]['cssid'] = $page['cssid'];
                $navi[$index]['title'] = $page['title'];
                $navi[$index]['slug'] = $page['slug'];
                $navi[$index]['url'] = $full_url;
                $navi[$index]['parent'] = $page['parent_id'];
                $navi[$index]['align'] = $page['align'];
                $navi[$index]['cssmode'] = "";

                $first_item = $i === 1;
                $current_item = $full_url === url::site(url::current());
                $last_item = $i === (count($pages));

                if(!$current_item && $first_item) { $navi[$index]['cssmode'] .= "first"; }
                if($current_item && $first_item) { $navi[$index]['cssmode'] .= "first " . $selectedclass; }
                if($current_item && $last_item) { $navi[$index]['cssmode'] .= "last " . $selectedclass; }
                if(!$current_item && $last_item) { $navi[$index]['cssmode'] .= "last"; }
                if($current_item && !$first_item && !$last_item) { $navi[$index]['cssmode'] .= $selectedclass; }

                $i++;
        }

        return $navi;
	}
	
	public function hook($name = '')
	{
            if(isset($name) AND is_array($name)) {
                foreach ($name as $nme) {
                    $file = APPPATH . 'views/' .$nme . '.php';
                    if(file_exists($file)){
                        View::factory($nme)->render(TRUE);
                    }
                }
            }
	}
}
/* End of file theme.php */
/* Location: ./application/helpers/theme.php */
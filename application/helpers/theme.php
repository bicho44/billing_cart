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
	public static $name = '';
	
	static function load_themes()
	{
		$modules = Kohana::config("core.modules");
		array_unshift($modules, THEMEPATH);
		Kohana::config_set("core.modules", $modules);
		
		theme::$name = Kohana::config('bc.theme');
		
		if (strpos(Router::$current_uri, 'admin') === 0)
			theme::$name = 'admin';
	}
}
/* End of file theme.php */
/* Location: ./application/helpers/theme.php */
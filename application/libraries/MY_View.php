<?php defined('SYSPATH') or die('No direct script access.');
/**
 * View Library
 *
 * Extends the view library to allow themes to work as views.
 *
 * @license 	MIT Licence
 * @category	Libraries
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		27 May 2009
 */
class View extends View_Core {

	public function set_filename($name, $type = NULL) {
		if ($path = Kohana::find_file('themes/'.theme::$name.'/views', $name, FALSE, Kohana::config('bc.view_ext')) OR
			$path = Kohana::find_file(theme::$name.'/views', $name, FALSE, Kohana::config('bc.view_ext')) OR
			$path = Kohana::find_file('views', $name, FALSE, Kohana::config('bc.view_ext')))
		{
			$this->kohana_filename = $path;
			$this->kohana_filetype = Kohana::config('bc.view_ext');;
		} else {
			parent::set_filename($name, $type);
		}
		return $this;
	}
}
/* End of file MY_View.php */
/* Location: ./application/libraries/MY_View.php */
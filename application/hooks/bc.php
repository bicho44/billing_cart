<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Billing Cart themes directory. This directory should contain all the public themes used
 * by Billing Cart.
 *
 * This path can be absolute or relative to this file.
 */
$bc_themes = 'themes';

// Billing Cart Themes Setup
$bc_themes = file_exists($bc_themes) ? $bc_themes : DOCROOT.$bc_themes;
define('THEMEPATH', str_replace('\\', '/', realpath($bc_themes)).'/');

// Clean up
unset($bc_themes);
/*
 	TODO: Future release will have plugins
*/
// Event::add('system.ready', 'plugin::load');
// Event::add('system.ready', 'config::load');

Event::add('system.post_routing', 'theme::load_themes');

$lang = Kohana::config('locale.language');

I18n::$lang = $lang[0];
function __($string, array $values = array())
{
	if (I18n::$lang !== I18n::$default_lang)
		$string = I18n::get($string);

	return empty($values) ? $string : strtr($string, $values);
}

function __n($singular, $plural, $count, array $values = array())
{
	if (I18n::$lang !== I18n::$default_lang)
	{
		$string = $count === 1 ? I18n::get($singular) : I18n::get_plural($plural, $count);
	}
	else
		$string = $count === 1 ? $singular : $plural;
	
	return strtr($string, array_merge($values, array('%count' => $count)));
}
/* End of file chinja.php */
/* Location: /cygdrive/e/learn/kohana_v2.3.2/application/hooks/chinja.php */
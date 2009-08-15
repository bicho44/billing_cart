<?php defined('SYSPATH') OR die('No direct access allowed.');
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
/* End of file bc.php */
/* Location: ./installer/hooks/bc.php */
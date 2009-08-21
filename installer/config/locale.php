<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * @package  Core
 *
 * Default language locale name(s).
 * First item must be a valid i18n directory name, subsequent items are alternative locales
 * for OS's that don't support the first (e.g. Windows). The first valid locale in the array will be used.
 * @see http://php.net/setlocale
 */
$config['language'] = array('en_GB', 'English_Great Britian');
// $config['language'] = array('de_DE', 'German_Germany');

/**
 * Available languages.
 */
$config['languages'] = array
(
	'de' => array('language' => array('de_DE', 'German_Germany'), 'name' => 'Deutsch'),
	'en' => array('language' => array('en_GB', 'English_Great Britian'), 'name' => 'English')
);

/**
 * Locale timezone. Defaults to use the server timezone.
 * @see http://php.net/timezones
 */
$config['timezone'] = '';
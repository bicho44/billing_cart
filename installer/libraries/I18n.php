<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Internationalization (i18n) class.
 *
 * @package    Kohana
 * @author     Kohana Team
 * @copyright  (c) 2008-2009 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class I18n_Core {

	// The default language of all messages
	public static $default_lang = 'en_GB';

	// The current language
	public static $lang = 'en_GB';

	// Cache of loaded languages
	protected static $_cache = array();

	/**
	 * Returns translation of a string. If no translation exists, the original
	 * string will be returned.
	 *
	 * @param   string   text to translate
	 * @return  string
	 */
	public static function get($string)
	{
		// Load the translation table
		$table = I18n::load(I18n::$lang);

		// Return the translated string if it exists
		return isset($table[$string]) ? $table[$string] : $string;
	}

	public static function get_plural($string, $count)
	{
		// Load the translation table
		$table = I18n::load(I18n::$lang);

		$key = I18n::get_plural_key(I18n::$lang, $count);
		
		// Return the translated string if it exists
		return isset($table[$string][$key]) ? $table[$string][$key]: $string;
	}
	
	/**
	 * Loads the translation table for a given language.
	 *
	 * @param   string   language to load
	 * @return  array
	 */
	protected static function load($lang)
	{
		if ( ! isset(I18n::$_cache[$lang]))
		{
			// Separate the language and locale
			list ($language, $locale) = explode('_', strtolower($lang));

			// Start a new translation table
			$table = array();

			if ($files = Kohana::find_file('i18n', $language))
			{
				foreach ($files as $file)
				{
					// Load the strings that are in this file
					$strings = include $file;

					// Merge the language strings into the translation table
					$table = array_merge($table, $strings);
				}
			}

			if ($files = Kohana::find_file('i18n', $language.'/'.$locale))
			{
				foreach ($files as $file)
				{
					// Load the strings that are in this file
					$strings = include $file;

					// Merge the locale strings into the translation table
					$table = array_merge($table, $strings);
				}
			}

			// Cache the translation table locally
			I18n::$_cache[$lang] = $table;
		}

		return I18n::$_cache[$lang];
	}

	/**
	 * This method is borrowed from the Gallery3 code:
	 * http://apps.sourceforge.net/trac/gallery/browser/gallery3/trunk/core/libraries/I18n.php?rev=20787#L217
	 *
	 * Gallery - a web based photo album viewer and editor
	 * Copyright (C) 2000-2009 Bharat Mediratta
	 *
	 * This program is free software; you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation; either version 2 of the License, or (at
	 * your option) any later version.
	 *
	 * This program is distributed in the hope that it will be useful, but
	 * WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
	 * General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with this program; if not, write to the Free Software
	 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
	 */
	private static function get_plural_key($lang, $count) {
		
		// Data from CLDR 1.6 (http://unicode.org/cldr/data/common/supplemental/plurals.xml).
		// Docs: http://www.unicode.org/cldr/data/charts/supplemental/language_plural_rules.html
		switch ($lang) {
			case 'az':
			case 'fa':
			case 'hu':
			case 'ja':
			case 'ko':
			case 'my':
			case 'to':
			case 'tr':
			case 'vi':
			case 'yo':
			case 'zh':
			case 'bo':
			case 'dz':
			case 'id':
			case 'jv':
			case 'ka':
			case 'km':
			case 'kn':
			case 'ms':
			case 'th':
				return 'other';

			case 'ar':
				if ($count == 0) {
					return 'zero';
				} else if ($count == 1) {
					return 'one';
				} else if ($count == 2) {
					return 'two';
				} else if (is_int($count) AND ($i = $count % 100) >= 3 AND $i <= 10) {
					return 'few';
				} else if (is_int($count) AND ($i = $count % 100) >= 11 AND $i <= 99) {
					return 'many';
				} else {
					return 'other';
				}

			case 'pt':
			case 'am':
			case 'bh':
			case 'fil':
			case 'tl':
			case 'guw':
			case 'hi':
			case 'ln':
			case 'mg':
			case 'nso':
			case 'ti':
			case 'wa':
				if ($count == 0 OR $count == 1) {
					return 'one';
				} else {
					return 'other';
				}

			case 'fr':
				if ($count >= 0 and $count < 2) {
					return 'one';
				} else {
					return 'other';
				}

			case 'lv':
				if ($count == 0) {
					return 'zero';
				} else if ($count % 10 == 1 AND $count % 100 != 11) {
					return 'one';
				} else {
					return 'other';
				}

			case 'ga':
			case 'se':
			case 'sma':
			case 'smi':
			case 'smj':
			case 'smn':
			case 'sms':
				if ($count == 1) {
					return 'one';
				} else if ($count == 2) {
					return 'two';
				} else {
					return 'other';
				}

			case 'ro':
			case 'mo':
				if ($count == 1) {
					return 'one';
				} else if (is_int($count) AND $count == 0 AND ($i = $count % 100) >= 1 AND $i <= 19) {
					return 'few';
				} else {
					return 'other';
				}

			case 'lt':
				if (is_int($count) AND $count % 10 == 1 AND $count % 100 != 11) {
					return 'one';
				} else if (is_int($count) AND ($i = $count % 10) >= 2 AND $i <= 9 AND ($i = $count % 100) < 11 AND $i > 19) {
					return 'few';
				} else {
					return 'other';
				}

			case 'hr':
			case 'ru':
			case 'sr':
			case 'uk':
			case 'be':
			case 'bs':
			case 'sh':
				if (is_int($count) AND $count % 10 == 1 AND $count % 100 != 11) {
					return 'one';
				} else if (is_int($count) AND ($i = $count % 10) >= 2 AND $i <= 4 AND ($i = $count % 100) < 12 AND $i > 14) {
					return 'few';
				} else if (is_int($count) AND ($count % 10 == 0 OR (($i = $count % 10) >= 5 AND $i <= 9) OR (($i = $count % 100) >= 11 AND $i <= 14))) {
					return 'many';
				} else {
					return 'other';
				}

			case 'cs':
			case 'sk':
				if ($count == 1) {
					return 'one';
				} else if (is_int($count) AND $count >= 2 AND $count <= 4) {
					return 'few';
				} else {
					return 'other';
				}

			case 'pl':
				if ($count == 1) {
					return 'one';
				} else if (is_int($count) AND ($i = $count % 10) >= 2 AND $i <= 4 &&
				($i = $count % 100) < 12 AND $i > 14 AND ($i = $count % 100) < 22 AND $i > 24) {
					return 'few';
				} else {
					return 'other';
				}

			case 'sl':
				if ($count % 100 == 1) {
					return 'one';
				} else if ($count % 100 == 2) {
					return 'two';
				} else if (is_int($count) AND ($i = $count % 100) >= 3 AND $i <= 4) {
					return 'few';
				} else {
					return 'other';
				}

			case 'mt':
				if ($count == 1) {
					return 'one';
				} else if ($count == 0 OR is_int($count) AND ($i = $count % 100) >= 2 AND $i <= 10) {
					return 'few';
				} else if (is_int($count) AND ($i = $count % 100) >= 11 AND $i <= 19) {
					return 'many';
				} else {
					return 'other';
				}

			case 'mk':
				if ($count % 10 == 1) {
					return 'one';
				} else {
					return 'other';
				}

			case 'cy':
				if ($count == 1) {
					return 'one';
				} else if ($count == 2) {
					return 'two';
				} else if ($count == 8 OR $count == 11) {
					return 'many';
				} else {
					return 'other';
				}

			default: // en, de, etc.
				return $count == 1 ? 'one' : 'other';
		}
	}

} // End i18n
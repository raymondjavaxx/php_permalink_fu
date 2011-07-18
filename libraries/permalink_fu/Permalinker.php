<?php
/**
 * PHP permalink_fu
 *
 * Copyright (C) 2011 Ramon Torres
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * Based on permalink_fu (https://github.com/technoweenie/permalink_fu)
 *
 * @copyright Copyright (C) 2011 Ramon Torres
 * @license The MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace permalink_fu;

/**
 * Permalinker
 *
 * @package permalink_fu
 */
class Permalinker {

	protected static $_config = array(
		'translation_to' => 'ascii//translit//IGNORE',
		'translation_from' => 'utf-8'
	);

	public static function config(array $config) {
		static::$_config = $config + static::$_config;
	}

	/**
	 * Permalink escaping magic thing
	 *
	 * @param string $string 
	 * @return string
	 */
	public static function escape($string) {
		$result = iconv(static::$_config['translation_from'], static::$_config['translation_to'], $string);

		$replacements = array(
			'/[^\x00-\x7F]+/' => '',
			'/[^\w_ \-]+/i'   => '',
			'/[ \-]+/i'       => '-',
			'/^\-|\-$/i'      => ''
		);

		$result = preg_replace(array_keys($replacements), array_values($replacements), $result);
		$result = strtolower($result);
		return $result;
	}
}

<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Setup
 *
 * Controls the CMS Authorization and Authentication.
 *
 * @license 	MIT Licence
 * @category	Helpers
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		20 Jul 2009
 */
class setup
{
	public function check_connection($username, $password, $hostname)
	{
		if (!$link = @mysql_connect($hostname, $username, $password)) {
			if (strpos(mysql_error(), 'Access denied') !== FALSE)
				throw new Exception('access');
				
			elseif (strpos(mysql_error(), 'server host') !== FALSE)
				throw new Exception('unknown_host');
				
			elseif (strpos(mysql_error(), 'connect to') !== FALSE)
				throw new Exception('connect_to_host');
				
			else
				throw new Exception(mysql_error());
		}

		return TRUE;
	}
	
	public function check_db($username, $password, $hostname, $database, $prefix)
	{
		if (!$link = @mysql_connect($hostname, $username, $password)) {
			if (strpos(mysql_error(), 'Access denied') !== FALSE)
				throw new Exception('access');
				
			elseif (strpos(mysql_error(), 'server host') !== FALSE)
				throw new Exception('unknown_host');
				
			elseif (strpos(mysql_error(), 'connect to') !== FALSE)
				throw new Exception('connect_to_host');
				
			else
				throw new Exception(mysql_error());
		}
		
		if (!@ mysql_select_db($database, $link)) {
	        // create database
	        $query = "CREATE DATABASE `{$database}` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
	
	        if (!@ mysql_query($query)){
	            throw new Exception('create');
	        }
	    }
	    /*elseif (@mysql_query("SELECT COUNT(*) FROM {$database}.`{$prefix}clients`")) {
	        throw new Exception('prefix');
	    }*/

		return TRUE;
	}
	
	public function create_database_config($data)
	{
		$config = new View('install/database_config');
		$config->username     = $data['username'];
		$config->password     = $data['password'];
		$config->hostname     = $data['host'];
		$config->database     = $data['database'];
		$config->table_prefix = $data['prefix'];

		return file_put_contents(DOCROOT.'application/config/database.php', $config);
	}
}
/* End of file setup.php */
/* Location: ./install/helpers/setup.php */
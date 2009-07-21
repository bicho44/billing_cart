<?php defined('SYSPATH') OR die('No direct access allowed.');

$lang = array
(
	'page_title'	=> 'Login',
	'title'			=> 'User Login',
	'email'			=> array
	(
		'title' 	=> 'Email',
		'required' 	=> 'Please enter a email address',
		'email' 	=> 'Please enter a valid email address',
	),
	'username'		=> array
	(
		'title'		=> 'Username',
		'required'	=> 'Please enter a username',
	),
	'password'      => array
	(
		'title'		=> 'Password',
		'required'	=> 'Please enter a password',
		'length'	=> 'The password entered is too short, minimum length is 5',
	),
	'password_confirm'  => array
	(
		'title'		=> 'Confirm Password',
		'matches'	=> 'The password entered doesn\'t match the password field',
	),
	'remember_me'   => 'Remember Me',
	'register'		=> 'Register',
	'submit'        => 'Login',
);
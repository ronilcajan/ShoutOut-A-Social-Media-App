<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	// for production
	'hostname' => 'shoutout-mysqldbserver.mysql.database.azure.com',
	'username' => 'ron@shoutout-mysqldbserver',
	'password' => 'kagebunshin1!',
	'database' => 'shoutout',
	// 'hostname' => 'localhost',
	// 'username' => 'root',
	// 'password' => '',
	// 'database' => 'shoutout',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

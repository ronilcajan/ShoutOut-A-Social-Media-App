<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	// for production
	'hostname' => 'myshoutout-mysqldbserver.mysql.database.azure.com',
	'username' => 'mysqldbuser@myshoutout-mysqldbserver',
	'password' => 'kagebunshin1!',
	'database' => 'mysqldatabase42507',
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'shout';
$route['404_override'] = 'shout/error404';
$route['translate_uri_dashes'] = FALSE;

$route['about'] = 'shout/about';
$route['login'] = 'shout/login';
$route['signup'] = 'shout/signup';
$route['signup-submit'] = 'shout/signup_submit';
$route['login-user'] = 'shout/login_submit';
$route['home/(:num)'] = 'shout/home/$1';
$route['home'] = 'shout/home';
$route['profile/(:num)'] = 'shout/profile/$1';
$route['profile'] = 'shout/profile';
$route['username/(:any)'] = 'shout/user_profile/$1';
$route['username'] = 'shout/user_profile';
$route['edit-profile'] = 'shout/edit_profile';
$route['post-submit'] = 'shout/post_submit';
$route['shout/home/post-submit'] = 'shout/post_submit';
$route['delete-post/(:num)'] = 'shout/delete_post/$1/';
$route['claps/(:num)'] = 'shout/claps/$1';
$route['comment/(:num)'] = 'shout/comment/$1';
$route['allpost'] = 'shout/allpost';
$route['logout'] = 'shout/logout';

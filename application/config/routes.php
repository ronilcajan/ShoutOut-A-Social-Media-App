<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['about'] = 'controller/about';
$route['login'] = 'controller/login';
$route['signup'] = 'controller/signup';
$route['signup-submit'] = 'controller/signup_submit';
$route['login-user'] = 'controller/login_submit';
$route['home'] = 'controller/home';
$route['profile'] = 'controller/profile';
$route['edit-profile'] = 'controller/edit_profile';
$route['post-submit'] = 'controller/post_submit';
$route['delete-post/(:num)'] = 'controller/delete_post/$1/';
$route['like/(:num)'] = 'controller/like/$1';
$route['comment/(:num)'] = 'controller/comment/$1';
$route['logout'] = 'controller/logout';
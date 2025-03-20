<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Dashboard_user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['Regis'] = 'Registrasi/registrasi';
$route['Login'] = 'Auth/login';
$route['Dashboard'] = 'Dashboard/index';
$route['Dashboard_user'] = 'dashboard_user/index';
$route['list_film'] = 'dashboard_user/filter_by_genre';
$route['film_list'] = 'dashboard_user/filter_by_negara';
$route['detail_list/(:num)'] = 'dashboard_user/detail_list/$1';
$route['Dashboard_autor'] = 'dashboard_autor/index';
// $route['detail_film/(:num)'] = 'dashboard_autor/detail/$1';
$route['detail_film/(:num)'] = 'dashboard_user/detail/$1';
$route['trailer/(:num)'] = 'Dashboard_user/trailer/$1';


$route['upload'] = 'Upload/index';
$route['profile'] = 'Profile/index';


$route['Admin/User'] = 'User/index';
$route['Admin/Film'] = 'Film/index';
$route['Admin/Negara'] = 'Negara/index';
$route['Admin/Tahun'] = 'Tahun/index';
$route['Admin/Genre'] = 'Genre/index';

$route['edit_user/(.+)'] = 'User/edit/$1';
$route['delete_user/(.+)'] = 'User/delete/$1';
$route['tambah_user'] = 'User/tambah';
$route['edit_film/(.+)'] = 'film/edit/$1';
$route['delete_film/(.+)'] = 'film/delete/$1';
$route['tambah_film'] = 'film/tambah';
$route['edit_negara/(.+)'] = 'negara/edit/$1';
$route['delete_negara/(.+)'] = 'negara/delete/$1';
$route['tambah_negara'] = 'negara/tambah';
$route['edit_tahun/(.+)'] = 'tahun/edit/$1';
$route['delete_tahun/(.+)'] = 'tahun/delete/$1';
$route['tambah_tahun'] = 'tahun/tambah';
$route['edit_genre/(.+)'] = 'genre/edit/$1';
$route['delete_genre/(.+)'] = 'genre/delete/$1';
$route['tambah_genre'] = 'genre/tambah';

$route['upload'] = 'upload/index';
$route['tambah_autor'] = 'upload/tambah';
$route['edit_autor/(.+)'] = 'upload/edit/$1';
$route['delete_autor/(.+)'] = 'upload/delete/$1';

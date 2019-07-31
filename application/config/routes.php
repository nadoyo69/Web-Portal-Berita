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

$route['default_controller'] = 'Home';
$route['404_override'] = '404';


/*********** USER DEFINED ROUTES *******************/
$route['blog/(:any)'] = 'Home/detail/$1';
$route['tag/(:any)'] = 'Home/bytag/$1';
$route['arsip.txt'] = 'Home/arsip';
$route['loginMe'] = 'Login/loginMe';
$route['kodeotp'] = 'Login/kodeotp';
$route['upload'] = 'user/upload';
$route['newupload'] = 'user/newupload';
$route['tag'] = 'user/tag';
$route['newtag'] = 'user/newtag';
$route['daftar'] = 'user/daftar';
$route['daftar/(:num)'] = "user/daftar/$1";
$route['deleteberita'] = "user/deleteberita";
$route['komen'] = 'user/komen';
$route['komen/(:num)'] = "user/komen/$1";
$route['deletekomen'] = "user/deletekomen";
$route['daftar'] = 'user/daftar';
$route['backup'] = 'user/backup';
$route['backupdata'] = 'user/backupdata';
$route['editberita'] = "user/editberita";
$route['editberita/(:num)'] = "user/editberita/$1";
$route['editdaftarberita'] = "user/editdaftarberita";
$route['dashboard'] = 'user';
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";
$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['profile'] = "user/profile";
$route['profile/(:any)'] = "user/profile/$1";
$route['profileUpdate'] = "user/profileUpdate";
$route['profileUpdate/(:any)'] = "user/profileUpdate/$1";

$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['changePassword/(:any)'] = "user/changePassword/$1";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistoy";
$route['login-history/(:num)'] = "user/loginHistoy/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";
$route['home/sitemap\.xml'] = "Home/sitemap";

$route['kontak'] = "Home/kontak";
$route['arsip'] = "Home/arsip";
$route['blog'] = "Home/blog";

/* End of file routes.php */
/* Location: ./application/config/routes.php */

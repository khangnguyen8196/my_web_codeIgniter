<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//home
$route['category-home/(:any)']['GET'] = 'HomeController/category/$1';
$route['brand-home/(:any)']['GET'] = 'HomeController/brand/$1';
$route['product-home/(:any)']['GET'] = 'HomeController/product/$1';
$route['cart-home']['GET'] = 'HomeController/cart/$1';
$route['login-home']['GET'] = 'HomeController/login/$1';

// login
$route['login']['GET'] = 'LoginController/index';
$route['login-user']['POST'] = 'LoginController/login';
// Dashboard
$route['dashboard']['GET'] = 'DashboardController/index';
$route['logout']['GET'] = 'DashboardController/logout';
// Brand
$route['brand/create']['GET'] = 'BrandController/create';
$route['brand/list']['GET'] = 'BrandController/index';
$route['brand/delete/(:any)']['GET'] = 'BrandController/delete/$1';
$route['brand/store']['POST'] = 'BrandController/store';
$route['brand/edit/(:any)']['GET'] = 'BrandController/edit/$1';
$route['brand/update/(:any)']['POST'] = 'BrandController/update/$1';
// Categories
$route['category/create']['GET'] = 'CategoryController/create';
$route['category/list']['GET'] = 'CategoryController/index';
$route['category/delete/(:any)']['GET'] = 'CategoryController/delete/$1';
$route['category/store']['POST'] = 'CategoryController/store';
$route['category/edit/(:any)']['GET'] = 'CategoryController/edit/$1';
$route['category/update/(:any)']['POST'] = 'CategoryController/update/$1';
// Products
$route['product/create']['GET'] = 'ProductController/create';
$route['product/list']['GET'] = 'ProductController/index';
$route['product/delete/(:any)']['GET'] = 'ProductController/delete/$1';
$route['product/store']['POST'] = 'ProductController/store';
$route['product/edit/(:any)']['GET'] = 'ProductController/edit/$1';
$route['product/update/(:any)']['POST'] = 'ProductController/update/$1';
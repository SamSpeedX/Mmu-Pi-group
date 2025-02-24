<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__.'/vendor/autoload.php';

use kibalanga\core\Router;

// View
Router::view('', 'welcome');
Router::view('about', 'about');
Router::view('products', 'products');
Router::view('contact', 'contact');
Router::view('cart', 'cart');
Router::view('t', 't');

// Auth
Router::view('login', 'Auth/signin');
Router::view('register', 'Auth/signup');
Router::view('user/profile', 'user/profile');
Router::post('ndani', [UserController::class, 'login']);
Router::post('awali', [UserController::class, 'register']);
Router::get('logout', [UserController::class, 'logout']);

// user profile
Router::post('badili_data', [UserController::class, 'delete']);
Router::get('user/products', 'user/products');

// merchant
Router::view('marchant', 'merchant/welcome');
Router::view('marchant/accounts', 'merchant/accounts');
Router::view('marchant/products', 'merchant/products');
Router::view('marchant/add_product', 'merchant/add-product');
Router::get('marchant/edit_product', 'merchant/edit-product');
Router::post('marchant/add-product', [ProductController::class, 'create']);
Router::get('marchant/delete_product', [ProductController::class, 'delete']);
Router::get('marchant/delete_product_one', [ProductController::class, 'delete']);
Router::get('marchant/delete_all_product', [ProductController::class, 'deleteAll']);
Router::get('marchant/del_p', [UserController::class, 'deleP']);

// Router::post('', [ProductController::class, '']);
// Router::post('', [ProductController::class, '']);
// Router::post('', [ProductController::class, '']);

// api
Router::api('api/profilejs', [UserController::class, 'read']);

Router::get('ochu', 'sam');
Router::post('marchant/edit_b_profile', [UserController::class, 'profile']);
Router::api('get-product', [ProductController::class, 'readAll']);
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
Router::view('all_users', 'user');

// google
Router::view('raman', 'raman');
Router::view('google', 'Auth/google');
Router::view('callback', 'Auth/callback');

// carts


// developer
Router::view('developersuport', 'payment/developer');
Router::post('developer', [ZenoController::class, 'pay']);

// Google Auth
Router::view('google+', 'Auth/google+');
// Router::post('google_register', [UserController::class, 'registerWithgoogle']);
Router::view('register_callback', 'Auth/register_callback');
Router::view('register_callback', [UserController::class, 'registerWithgoogle']);

// Pi
Router::view('pay', 'payment/pay');
Router::view('lipa', 'payment/lipa');

// chats
Router::view('chat', 'chat/chat');
Router::view('messages', 'chat/messages');
Router::post('set', [chatController::class, 'create']);
Router::post('get-chats', [chatController::class, 'readAll']);

// Auth
Router::view('login', 'Auth/signin');
Router::view('register', 'Auth/signup');
Router::view('user/profile', 'user/profile');
Router::post('ndani', [UserController::class, 'login']);
Router::post('awali', [UserController::class, 'register']);
Router::get('logout', [UserController::class, 'logout']);
Router::post('edit_user_profile', [UsersController::class, 'update']);

Router::post('marchant/edit_b_profile', [UserController::class, 'profile']);

// user profile
Router::get('user/delete_user', [UserController::class, 'delete']);
Router::view('user/products', 'user/products');

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

// admn
Router::view('boss', 'admin/welcome');
Router::view('boss/accounts', 'admin/accounts');
Router::view('boss/products', 'admin/products');
Router::view('boss/add_product', 'admin/add-product');
Router::view('boss/edit_product', 'admin/edit-product');
Router::post('boss/add-product', [ProductController::class, 'create']);
Router::get('boss/delete_product', [ProductController::class, 'delete']);
Router::get('boss/delete_product_one', [ProductController::class, 'delete']);
Router::get('boss/delete_all_product', [ProductController::class, 'deleteAll']);
Router::get('boss/del_p', [UserController::class, 'deleP']);
Router::view('boss/users', 'admin/users');
Router::view('boss/edit_user', 'admin/edit_user');

// member
Router::view('member', 'admin/welcome');
Router::view('member/accounts', 'admin/accounts');
Router::view('member/products', 'admin/products');
Router::view('member/add_product', 'admin/add-product');
Router::view('member/edit_product', 'admin/edit-product');
Router::post('member/add-product', [ProductController::class, 'create']);
Router::get('member/delete_product', [ProductController::class, 'delete']);
Router::get('member/delete_product_one', [ProductController::class, 'delete']);
Router::get('member/delete_all_product', [ProductController::class, 'deleteAll']);
Router::get('member/del_p', [UserController::class, 'deleP']);
Router::view('member/users', 'admin/users');
Router::view('member/edit_user', 'admin/edit_user');

// cart
Router::post('add-to-cart', [CartController::class, 'create']);
// Router::post('cart_update', [CartController::class, 'update']);
// Router::post('delete_cart', [CartController::class, 'delete']);

// api
Router::api('get-product', [ProductController::class, 'readAll']);

<?php 

use Bramus\Router\Router;
use App\Controllers\CategoryController;
use App\Controllers\ProductController;

$router = new Router();

// Khu vực khai báo các đường dẫn - router 
$router->get('/', function(){
    return view('admin.DashBoard');
});

// Gom nhóm route - dùng mount
$router->mount('/admin', function() use ($router){

    $router->get('/', function () {
        return view('admin.Home');
    });
   
});

// Fix: Use the correct format for controller callbacks
$router->get('/product', 'App\Controllers\ProductController@index');
$router->get('/product/{id}/show', 'App\Controllers\ProductController@show');
$router->get('/product/create', 'App\Controllers\ProductController@create');
$router->post('/product/store', 'App\Controllers\ProductController@store');
$router->get('/product/{id}/edit', 'App\Controllers\ProductController@edit');
$router->post('/product/{id}/update', 'App\Controllers\ProductController@update');
$router->get('/product/{id}/delete', 'App\Controllers\ProductController@destroy');

// Gọi hàm run
$router->run();
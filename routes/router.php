<?php

use Bramus\Router\Router;
use App\Controllers\CategoryController;
use App\Controllers\ProductController;
use App\Models\User;
use App\Controllers\UserController;
use App\Controllers\ServicesController;

$router = new Router();

// Khu vực khai báo các đường dẫn - router 
// $router->get('/', function(){
//     return view('admin.DashBoard');
// });

// Gom nhóm route - dùng mount
$router->mount('/admin', function () use ($router) {

    $router->get('/', function () {
        return view('admin.Home');
    });
});

$router->mount('/services', function () use ($router) {
    $router->get('/', ServicesController::class . '@index');
    $router->get('/{id}/show', ServicesController::class . '@show');
    $router->get('/create', ServicesController::class . '@create');
    $router->post('/store', ServicesController::class . '@store');
    $router->get('/{id}/edit', ServicesController::class . '@edit');
    $router->post('/{id}/update', ServicesController::class . '@update');
    $router->post('/{id}/delete', ServicesController::class . '@destroy');
});

$router->mount('/product', function () use ($router) {
    $router->get('/', ProductController::class . '@index');
    $router->get('/{id}/show', ProductController::class . '@show');
    $router->get('/create', ProductController::class . '@create');
    $router->post('/store', ProductController::class . '@store');
    $router->get('/{id}/edit', ProductController::class . '@edit');
    $router->post('/{id}/update', ProductController::class . '@update');
    $router->post('/{id}/delete', ProductController::class . '@destroy');
});


$router->mount('/user', function () use ($router) {
    $router->get('/', UserController::class . '@index');
    $router->get('/{id}/show', UserController::class . '@show');
    $router->get('/create', UserController::class . '@create');
    $router->post('/store', UserController::class . '@store');
    $router->get('/{id}/edit', UserController::class . '@edit');
    $router->post('/{id}/update', UserController::class . '@update');
    $router->post('/{id}/delete', UserController::class . '@destroy');
});

// Gọi hàm run
$router->run();

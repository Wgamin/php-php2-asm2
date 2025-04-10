<?php 

use Bramus\Router\Router;
use App\Controllers\CategoryController;
use App\Controllers\ProductController;

$router = new Router();

// Khu vực khai báo các đường dẫn - router 
// $router->get('/', function(){
//     return view('admin.DashBoard');
// });

// Gom nhóm route - dùng mount
$router->mount('/admin', function() use ($router){

    $router->get('/', function () {
        return view('admin.Home');
    });
   
});

$router->mount('/product', function() use ($router) {
    $router->get('/', ProductController::class . '@index');
    $router->get('/{id}/show', ProductController::class . '@show');
    $router->get('/create', ProductController::class . '@create');
    $router->post('/store', ProductController::class . '@store');
    $router->get('/{id}/edit', ProductController::class . '@edit');
    $router->post('/{id}/update', ProductController::class . '@update');
    $router->post('/{id}/delete', ProductController::class . '@destroy');
});

// Gọi hàm run
$router->run();
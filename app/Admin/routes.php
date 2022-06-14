<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('home');
    
    // $router->any('config/setting', 'ConfigController@setting');
    $router->get('form', Setting::class);
    $router->resources([
        'auth/article'      => ArticleController::class,
        'auth/nav'          => NavController::class,
    ]);
});

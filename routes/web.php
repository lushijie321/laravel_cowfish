<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//后台
use App\Http\Controllers\Home;

Route::any('/', [Home\IndexController::class, 'index']);
Route::any('home/start', [Home\IndexController::class, 'start']);
Route::any('home/result', [Home\IndexController::class, 'result']);

Route::any('home/lists/{id}', [Home\IndexController::class, 'lists']);
Route::any('home/content/{id}', [Home\IndexController::class, 'content']);

Route::any('home/redis', [Home\RedisController::class, 'index']);
Route::any('home/redis/start', [Home\RedisController::class, 'start']);
Route::any('home/redis/result', [Home\RedisController::class, 'result']);

Route::any('home/swoole', [Home\SwooleController::class, 'index']);
Route::any('home/swoole/onOpen', [Home\SwooleController::class, 'onOpen']);
Route::any('home/swoole/onMessage', [Home\SwooleController::class, 'onMessage']);
Route::any('home/swoole/onClose', [Home\SwooleController::class, 'onClose']);
<?php
use Illuminate\Support\Facades\Route;
use App\http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\CatsController;
use App\Http\Controllers\AdminTableController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AuthMiddleware;

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
Route::get('/',[AdminController::class,'index'])->name('index');
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::get('/logout',[AdminController::class,'logout'])->name('logout');


Route::middleware([App\Http\Middleware\AuthMiddleware::class])->group(function (){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::resource('/products',ProductsController::class);
    Route::resource('/brands',BrandsController::class);
    Route::resource('/cats',CatsController::class);
    Route::resource('/comments',CommentsController::class);
    Route::resource('/messages',MessagesController::class);
    Route::resource('/admins',AdminTableController::class);
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::post('/readmessage', [MessagesController::class, 'readmessage'])->name('readmessage');
    Route::post('/addnewadmin', [AdminTableController::class, 'addnewadmin'])->name('addnewadmin');

});


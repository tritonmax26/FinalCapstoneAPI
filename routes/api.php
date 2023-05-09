<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Public Routes

//register
Route::post('/register', [AuthController::class,'register']);

//login
Route::post('/login', [AuthController::class,'login']);

//products table
// Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class,'index']);
Route::get('/products/search/', [ProductController::class,'search']);
Route::get('/products/{id}', [ProductController::class,'show']);

//shops table
// Route::resource('shops', ShopController::class);
Route::get('/shops', [ShopController::class,'index']);
Route::get('/shops/search/', [ShopController::class,'search']);
Route::get('/shops/{id}', [ShopController::class,'show']);


//trial for foriegn

Route::get('/users', [UserController::class,'index']);
Route::get('/users/{id}', [UserController::class,'show']);

//for image
Route::get('/image/{image}', [ImageController::class,'getImage'])->where('image', '.*');




//Protected routes

Route::group(['middleware'=>['auth:sanctum']], function () {

    //for product table
    Route::post('/products', [ProductController::class,'store']);
    Route::put('/products/{id}', [ProductController::class,'update']);
    Route::delete('/products/{id}', [ProductController::class,'destroy']);


    //for shops table
    Route::post('/shops', [ShopController::class,'store']);
    Route::put('/shops/{id}', [ShopController::class,'update']);
    Route::delete('/shops/{id}', [ShopController::class,'destroy']); 

    //for image
    Route::post('/upload', [ImageController::class,'upload']);
    Route::put('/users/profile', [UserController::class,'updateProfilePicture']);
    
    
    //Logged out
    Route::post('/logout', [AuthController::class,'logout']);
});

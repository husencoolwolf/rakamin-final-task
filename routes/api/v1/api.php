<?php

use App\Http\Controllers\api\v1\ArticleController as ApiArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\LoginController as ApiLoginController;
use App\Http\Controllers\api\v1\UserController as ApiUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('/login', [LoginController::class, 'login']);
// Route::prefix('/user')->middleware('auth:api')->group(function () {
//   // Route::post('/login', [LoginController::class, 'login']);
//   Route::get('/all', [ApiUserController::class, 'index']);
// });

//route login tanpa middleware
// http://rakamin-final-task.test/api/v1/login
Route::post("/login", [ApiLoginController::class, 'login']);

//route logout dengan middleware api
//http://rakamin-final-task.test/api/v1/logout
Route::get('/logout', [ApiLoginController::class, 'logout'])->middleware('auth:api');

//route get user dengan middleware api
Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function () {
  Route::get('/all', [ApiUserController::class, 'index']);
});

Route::group(['prefix' => 'post', 'middleware' => 'auth:api'], function () {
  Route::get('/all', [ApiArticleController::class, 'index']);
  Route::get('/show detail/{id}', [ApiArticleController::class, 'show']);
  Route::post("/create", [ApiArticleController::class, 'store']);
  Route::post("/update/{id} ", [ApiArticleController::class, 'update']);
  Route::post("/delete/{id}", [ApiArticleController::class, 'destroy']);
});

// Route::group(["prefix"])


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//   return $request->user();
// });

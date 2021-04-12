<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\ProductContoller;
use App\Http\Controllers\Api\TagController;
use App\Http\Resources\UserFullResource;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::get('tags', [TagController::class, 'index']);
Route::get('tags/{id}', [TagController::class, 'show']);

Route::get('products', [ProductContoller::class, 'index']);
Route::get('products/{id}', [ProductContoller::class, 'show']);


Route::get('countries', [CountryController::class, 'index']);
Route::get('countries/{id}/states', [CountryController::class, 'showState']);
Route::get('countries/{id}/cities', [CountryController::class, 'showCities']);

Route::get('users', function (){

return UserFullResource::collection(User::paginate());

});


Route::post('auth/register', [AuthController::class, 'register'] );
Route::post('auth/login', [AuthController::class, 'login'] );



//Route::get('categories','Api/CategoryController@index');






Route::group(['auth:api'],function (){




});
//Route::middleware('auth:api')->get('/products', function (Request $request) {
  //  return Product::all();
//});

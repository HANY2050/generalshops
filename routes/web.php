<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DataImportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UnitController;
use App\Models\City;
use App\Models\Country;
use App\Models\Image;
use App\Models\Product;
use App\Models\Role;
use App\Models\State;
use App\Models\Tag;
use App\Models\User;
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
/*Route::get('users',function (){

 return User::paginate(50);

});
Route::get('product',function (){

    return Product::with(['image'])-> paginate(50);

});
Route::get('image',function (){

    return Image::with(['product'])->paginate(50);

});
Route::get('states',function (){

    return State::with(['cites'])->paginate(1);

});
Route::get('/units_add', [DataImportController::class, 'importUnits']);
*/



Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
Route::get('/admin', function (){

    return 'Hello';

})->middleware(['auth','user_is_admin','user_is_support']);


Route::get('test_tag',function (){

    $tag = Tag::find(2);
    return $tag->products;
});
*/

/*
Route::get('test_tag',function (){

    $tag = User::find(502);
    return $tag->roles;
});
*/
Route::group(['auth'=>'user_is_admin'], function(){
//Unit
    Route::get('units', [UnitController::class, 'index'])->name('units')->middleware(['auth','user_is_admin']);
    Route::post('units', [UnitController::class, 'store']);
    Route::delete('units', [UnitController::class, 'delete']);
    Route::put('units', [UnitController::class, 'update']);
    Route::get('search-units', [UnitController::class, 'search'])->name('search-units');

//Tag
    Route::get('tags', [TagController::class, 'index'])->name('tags')->middleware(['auth','user_is_admin']);
    Route::post('tags', [TagController::class, 'store']);
    Route::get('search-tags', [TagController::class, 'search'])->name('search-tags');
    Route::put('tags', [TagController::class, 'update']);
    Route::delete('tags', [TagController::class, 'delete']);



//categories
    Route::get('categories', [CategoryController::class, 'index'])->name('categories')->middleware(['auth','user_is_admin']);
    Route::post('categories', [CategoryController::class, 'store']);
    Route::get('search-categories', [CategoryController::class, 'search'])->name('search-categories');
    Route::put('categories', [CategoryController::class, 'update']);
    Route::delete('categories', [CategoryController::class, 'delete']);
    Route::get('edit-image/{id}', [CategoryController::class, 'editImage'])->name('edit-image');;
    Route::post('updateImage', [CategoryController::class, 'updateImage'])->name('image.update');












//products
    Route::get('products', [ProductController::class, 'index'])->name('products')->middleware(['auth','user_is_admin']);
    Route::post('new-product', [ProductController::class, 'store']);
    Route::get('new-product',[ProductController::class ,'newProduct'])->name('new-product');
    Route::put('update-product', [ProductController::class, 'update'])->name('update-product');

    Route::get('update-product/{id?}',[ProductController::class ,'newProduct'])->name('update-product-form');
    Route::delete('new-product/{id}', [ProductController::class, 'delete']);
    Route::delete('new-product/{id}', [ProductController::class, 'deleteOption'])->name('dddd');









    Route::get('countries', [CountryController::class, 'index'])->name('countries')->middleware(['auth','user_is_admin']);
    Route::get('cities', [CityController::class, 'index'])->name('cities')->middleware(['auth','user_is_admin']);
    Route::get('state', [StateController::class, 'index'])->name('state')->middleware(['auth','user_is_admin']);
    Route::get('reviews', [ReviewController::class, 'index'])->name('reviews')->middleware(['auth','user_is_admin']);
    Route::get('tickets', [TicketController::class, 'index'])->name('tickets')->middleware(['auth','user_is_admin']);
    Route::get('roles', [RoleController::class, 'index'])->name('roles')->middleware(['auth','user_is_admin']);

});



//Route::get('/admin', function (){
//
//    return 'Hello';
//
//})->middleware(['auth','user_is_admin']);

//Route::group(['namespace' => 'Admin'], function() {
//    Route::resource('users', 'UserController');
//});

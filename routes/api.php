<?php

use App\User;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*----USER---*/

Route::get('users','Api\LoginController@index');
Route::post('users','Api\LoginController@store');
Route::get('users/{id}','Api\LoginController@show');
Route::put('users/{id}','Api\LoginController@update');
Route::delete('users/{id}','Api\LoginController@destroy');
Route::post('register','Api\LoginController@register');
Route::post('login','Api\LoginController@login');
Route::get('profile','Api\LoginController@getAuthenticatedUser');

/*-----CATEGORY----*/

Route::get('category','Api\CategoryController@index');
Route::post('category','Api\CategoryController@store');
Route::get('category/{id}','Api\CategoryController@show');
Route::put('category/{id}','Api\CategoryController@update');
Route::delete('category/{id}','Api\CategoryController@destroy');
/*----CATEPRODUCT----*/

Route::get('cateproduct','Api\CateproductController@index');
Route::post('cateproduct','Api\CateproductController@store');
Route::get('cateproduct/{id}','Api\CateproductController@show');
Route::put('cateproduct/{id}','Api\CateproductController@update');
Route::delete('cateproduct/{id}','Api\CateproductController@destroy');
/*----PRODUCT-----*/
Route::get('product','Api\ProductController@index');
/**---SHOPPING CART */
Route::post('cart','Api\BillController@cart');
Route::get('getCheckOut', 'Api\BillController@getCheckOut');
Route::get('dropCart', 'Api\BillController@dropCart');
Route::delete('removeFromCart','Api\BillController@removeFromCart');
Route::post('postCheckOut', 'Api\BillController@postCheckOut');
Route::post('updateCart', 'Api\BillController@updateCart');
/*Route::post('product','Api\ProductController@store');
Route::get('product/{id}','Api\ProductController@show');
Route::put('product/{id}','Api\ProductController@update');
Route::delete('product/{id}','Api\ProductController@destroy');*/
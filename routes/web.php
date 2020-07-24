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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'login', 'middleware' => 'ChecklogIn'], function () {
        Route::get('/', 'LoginController@getLogin');
        Route::post('/', 'LoginController@postLogin');
    });
    Route::group(['prefix' => 'admin', 'middleware' => 'ChecklogOut'], function () {
        Route::get('home', 'HomeController@getHome');
        //------CATEGORY-------//
        //
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'CategoryController@getCate');
            Route::post('/', 'CategoryController@postCate');

            Route::get('edit/{id}', 'CategoryController@getEditCate');
            Route::post('edit/{id}', 'CategoryController@postEditCate');

            Route::get('delete/{id}', 'CategoryController@getDeleteCate');
        });
        //------CATEPRODUCT-------//
        //
        Route::group(['prefix' => 'cateproduct'], function () {
            Route::get('/', 'CateproductController@getCatepro');
            Route::get('add', 'CateproductController@getAddCatepro');
            Route::post('add', 'CateproductController@postAddCatepro');

            Route::get('edit/{id}', 'CateproductController@getEditCatepro');
            Route::post('edit/{id}', 'CateproductController@postEditCatepro');

            Route::get('delete/{id}', 'CateproductController@getDeleteCatepro');
        });
        //------PRODUCT-------//
        //
        
        Route::group(['prefix' =>'product'],function(){
            Route::get('/','ProductController@getProduct');
            Route::get('add','ProductController@getAddProduct');
            Route::post('add','ProductController@postAddProduct');

            Route::get('edit/{id}','ProductController@getEditProduct');
            Route::post('edit/{id}','ProductController@postEditProduct');

            Route::get('delete/{id}','ProductController@getDeleteProduct');
        });
        
        //---------BILL---------//       
        Route::resource('bill', 'AdminBillController');
        Route::get('delete/{id}','AdminBillController@destroy');       
    });
    Route::get('logout', 'HomeController@getLogout');
});

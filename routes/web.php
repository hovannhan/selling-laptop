<?php
Route::get('/text', function(){
    Cart::destroy();
});

Route::get('/','PageController@index')->name('index');
Route::get('/category/{id}','PageController@category')->name('category');
Route::get('/product/{product}','PageController@product')->name('product');
Route::get('/cart/{id}', 'CartController@addCart')->name('cart_add');
Route::get('/cart', 'CartController@index')->name('indexCart');
Route::get('/cart/destroy', 'CartController@cartDestroy')->name('Cartdestroy');
//----------------------Admin Page-------------------------------
Route::get('/admin/login','AdminController@getlogin')->name('admin.getLogin');
Route::post('/admin/login','AdminController@login')->name('admin.login');
Route::get('/admin/logout','AdminController@logout')->name('admin.logout');
//-----------------------------------------------------------------------------
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');
//-------------------------------------------------------------------------------
Route::group(['prefix'=>'admin','middleware'=>'admin'],function (){
//-----------------------User Management------------------------------------
    Route::get('/', function () {
        return view('Admin.layouts.index');
    })->name('admin.index');
    Route::group(['prefix'=>'users'],function () {
        Route::get('list', 'UserController@index')->name("users.list");
        Route::get('add', 'UserController@create');
        Route::post('add', 'UserController@store')->name("users.add");
        Route::get('edit/{user}', 'UserController@edit')->name("users.edit");
        Route::put('edit/{user}','UserController@update')->name("users.update");
        Route::delete('delete/{user}','UserController@destroy')->name("users.destroy");
    });
    //-----------------Category Management-----------------------------------
    Route::group(['prefix'=>'categories'],function (){
        Route::get('list', 'CategoryController@index')->name("categories.list");
        Route::get('add', 'CategoryController@create');
        Route::post('add', 'CategoryController@store')->name("categories.add");
        Route::get('edit/{category}', 'CategoryController@edit')->name("categories.edit");
        Route::put('edit/{category}','CategoryController@update')->name('categories.update');
        Route::delete('delete/{category}','CategoryController@destroy')->name("categories.destroy");
    //---------------------------Product Management--------------------------------------
    });
    Route::group(['prefix'=>'products'],function (){
        Route::get('list', 'ProductController@index')->name("products.list");
        Route::get('add', 'ProductController@create')->name("product.create");
        Route::post('add', 'ProductController@store')->name("products.add");
        Route::get('edit/{product}', 'ProductController@edit')->name("products.edit");
        Route::put('edit/{product}','ProductController@update')->name('products.update');
        Route::delete('delete/{product}','ProductController@destroy')->name("products.destroy");
    });
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

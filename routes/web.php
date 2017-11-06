<?php

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
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);

    Route::group(['prefix' => 'category'], function () {
        Route::get('/add', 'CategoryController@getAdd');
        Route::post('/add', 'CategoryController@postAdd');

        Route::get('/list', 'CategoryController@getList');

        Route::get('/detail/{id}', 'CategoryController@getDetail');

        Route::get('/edit/{id}', 'CategoryController@getEdit');
        Route::post('/edit/{id}', 'CategoryController@postEdit');
        //
        Route::get('/editstt', 'CategoryController@getEditStt');

        Route::get('/delete', 'CategoryController@getDelete');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/add', 'ProductController@getAdd');
        Route::post('/add', 'ProductController@postAdd');

        Route::get('/list', 'ProductController@getList');
        Route::get('/detail/{id}', 'ProductController@getDetail');

        Route::get('/edit/{id}', 'ProductController@getEdit');
        Route::post('/edit/{id}', 'ProductController@postEdit');

        Route::get('/delete', 'ProductController@delete');

        Route::get('/delete-image/{id}', 'ProductController@deleteImage');

        Route::get('/edit-status/{id}', 'ProductController@editStatus');
    });

    Route::group(['prefix' => 'order'], function () {

        Route::get('/list', 'OrderController@getList');
        Route::get('/detail/{id}', 'OrderController@orderDetail');
        Route::get('/accpet/{id}/{type}', 'OrderController@accept');
        Route::get('/edit/{id}', 'OrderController@getEdit');
        Route::post('/edit/{id}', 'OrderController@postEdit');
    });

    Route::group(['prefix' => 'user'], function () {

        Route::get('/add', 'UserController@getAdd');
        Route::get('/list', 'UserController@getList');

        Route::get('/profile',['uses'=> 'UserController@getProfile']);

        Route::post('/upload-avatar', 'UserController@uploadAvatar');
    });

    Route::group(['prefix' => 'customer'], function () {
        Route::get('/list', 'CustomerController@getList');
        Route::get('/edit/{id}', 'CustomerController@getEdit');
        Route::post('/edit/{id}', 'CustomerController@postEdit');
        Route::get('/get-district', 'CustomerController@getDistrict');
        Route::get('/profile',['uses'=> 'CustomerController@getProfile']);
    });

    Route::group(['prefix' => 'contact'], function () {


        // Route::get('/add', 'DistrictController@getAdd');
        // Route::post('/add', 'DistrictController@postAdd');

        Route::get('/list', 'ContactController@getList');

        Route::get('/edit/{id}', 'ContactController@getEdit');
        Route::post('/edit/{id}', 'ContactController@postEdit');

        Route::get('/delete/{id}', 'ContactController@getDelete');
    });

    Route::group(['prefix' => 'state'], function () {
        Route::get('/add', 'StateController@getAdd');
        Route::post('/add', 'StateController@postAdd');

        Route::get('/list', 'StateController@getList');
        Route::get('/detail/{id}', 'StateController@detail');

        Route::get('/edit/{id}', 'StateController@getEdit');
        Route::post('/edit/{id}', 'StateController@postEdit');
        //
        Route::get('/editstt', 'StateController@getEditStt');

        Route::get('/delete/{id}', 'StateController@getDelete');
    });




    Route::group(['prefix' => 'district'], function () {


        Route::get('/add', 'DistrictController@getAdd');
        Route::post('/add', 'DistrictController@postAdd');

        Route::get('/list', 'DistrictController@getList');

        Route::get('/edit/{id}', 'DistrictController@getEdit');
        Route::post('/edit/{id}', 'DistrictController@postEdit');

        Route::get('/delete/{id}', 'DistrictController@getDelete');
    });

    Route::group(['prefix' => 'page'], function () {
        Route::get('/add', 'PageController@getAdd');
        Route::post('/add', 'PageController@postAdd');

        Route::get('/list', 'PageController@getList');
        Route::get('/detail/{id}', 'PageController@detail');

        Route::get('/edit/{id}', 'PageController@getEdit');
        Route::post('/edit/{id}', 'PageController@postEdit');
        //
        Route::get('/editstt', 'PageController@getEditStt');

        Route::get('/delete/{id}', 'PageController@getDelete');
    });

    Route::group(['prefix' => 'post'], function () {
        Route::get('/add', 'PostController@getAdd');
        Route::post('/add', 'PostController@postAdd');

        Route::get('/list', 'PostController@getList');
        Route::get('/detail/{id}', 'PostController@detail');

        Route::get('/edit/{id}', 'PostController@getEdit');
        Route::post('/edit/{id}', 'PostController@postEdit');
        //
        Route::get('/editstt', 'PostController@getEditStt');

        Route::get('/delete/{id}', 'PostController@getDelete');
    });


});

//Group PRofile : users after login
Route::group(['prefix'=>'profile','middleware' => 'auth'], function(){
    Route::get('/', 'HomeController@getProfile');
    Route::get('/download/{item}/{itemid}', 'OrderController@download');
});
//end group Profile


Route::get('/', 'HomeController@index');
Route::get('/test', function(){
    return view('frontend.pages.test');
});

// Route::get('/product-list', 'HomeController@getList');

Route::get('/product/{id}', 'HomeController@productDetail');

Route::get('/search', 'HomeController@search');


Route::get('/category/{id}', 'HomeController@category');

Route::get('add-to-cart/{id}',['uses'=> 'HomeController@addToCart']);
Route::get('/cart', 'HomeController@cart');
Route::get('/remove-item-cart/{rowId}', 'HomeController@removeItemCart');
Route::get('/update-item-cart', 'HomeController@updateItemCart');
Route::get('/check-out', 'HomeController@checkOut');
Route::get('/check-out/success', ['as'=>'success', 'uses'=>'HomeController@checkOutSuccess']);
Route::post('/add-customer', ['as'=>'checkoutsuccess', 'uses'=>'CustomerController@addCustomter'] );

Route::get('/get-city', 'HomeController@getCity');

Route::get('/continue-shopping', 'HomeController@continueShopping');

// Page contact us
Route::get('contact-us', 'HomeController@getContactUs');
Route::post('contact-us', 'HomeController@postContactUs');


Route::get('about-us', 'HomeController@getAbouttUs');

Route::get('page/{id}', 'HomeController@page');
Route::get('post/{id}', 'HomeController@post');

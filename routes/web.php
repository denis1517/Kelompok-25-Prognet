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

Route::get('/userlogin', 'userController@index');
Route::post('/signin', 'userController@signin');
Route::get('/register', 'userController@register');
Route::post('/registerPost', 'userController@registerPost');
Route::post('/logout', 'userController@destroy');

Route::group(['middleware'=>'auth:admin'], function(){
    Route::resource('/admin/discounts','discountController');
    Route::resource('/admin/product','productController');
    Route::resource('/admin/couriers','courierController');
    Route::resource('/admin/categories','categoriesController');
    Route::resource('/admin/product-images', 'productImageController');
    Route::resource('/admin/categories-details', 'productCategoryDetailsController');
    Route::get('/admin/product/{id}/aktif','productController@aktif');
    Route::get('/admin/dashboard','adminController@dashboard');
});

Route::get('/', function () {
    return view('index');
});
Route::get('/admin', function () {
    return view('adminlogin');
});
Route::get('/index', function () {
    return view('index');
});
Route::resource('/shop','shopController');
//generated by laravel's default auth
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');;

//admin routes
Route::get('/register/admin', 'AdminController@create');
Route::get('/login/admin', 'AdminController@loginAdmin');
Route::post('/register/admin', 'AdminController@registerAdmin')->name('register.admin');
Route::post('/login/admin', 'AdminController@adminAuth')->name('login.admin');

//admin routes we want protected 
Route::group(['middleware'=>'auth:admin'], function(){
    Route::get('/home/admin', 'AdminController@home')->middleware('verified');;
    Route::post('/logout/admin', 'AdminController@logout')->name('logout.admin');
});

Route::get('pic',function (){
    return view('pic.pic');
});
Route::post('saved','test2Controller@save');
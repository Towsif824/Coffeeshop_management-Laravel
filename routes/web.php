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

Route::get('/', function () {
    return view('index');
});


Route::get('/welcome', function(){
	return view('test');
});
Route::get('/register', 'customerRegistrationController@registration')->name('customerRegistration.registration');
Route::post('/register', 'customerRegistrationController@postRegistration')->name('customerRegistration.registration');

/*Route::get('/fb', 'WebController@fbtn');
Route::get('/fbsub', 'WebController@fbsubmit');
Route::get('/fbres', 'WebController@fbres');*/

Route::get('login/facebook', 'LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'LoginController@handleProviderCallback');


Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', ['uses'=>'LoginController@verify']);
Route::get('/logout', ['as'=>'logout.index', 'uses'=>'logoutController@index']);

//Route::get('/login/facebook/callback', 'HomeController@index')->name('home.index');

/*Route::group(['middleware'=>'sess'], function(){
	Route::get('/home', 'HomeController@index')->middleware('sess');
	Route::get('/home/edit/{id}', 'HomeController@edit')->middleware('sess');
	Route::post('/home/edit/{id}', 'HomeController@update')->middleware('sess');
	Route::get('/home/delete/{id}', 'HomeController@delete')->middleware('sess');
	Route::post('/home/delete/{id}', 'HomeController@destroy')->middleware('sess');
});*/

Route::middleware(['sess'])->group(function(){

	Route::get('/userProfile', 'HomeController@index')->name('home.index');

		Route::get('/admin/create', 'HomeController@create')->name('home.create');
		Route::post('/admin/create', 'HomeController@store');
		Route::get('/customer/edit/{id}', 'HomeController@edit')->name('home.edit');
		Route::post('/customer/edit/{id}', 'HomeController@update');
		Route::get('/home/delete/{id}', 'HomeController@delete')->name('home.delete');
		Route::post('/home/delete/{id}', 'HomeController@destroy');
		Route::get('/home/profile/{id}', 'HomeController@profile')->name('home.profile');
		
		//search
		//Route::get('/foodsearch/{id}','HomeController@foodsearch');
		Route::get('/search/{id}', 'HomeController@search')->name('topicDetails');
		//Route::post('/search', 'HomeController@find')->name('search.search');
		
		Route::get('/menu/food', 'HomeController@menu')->name('home.food');
		Route::get('/download/{id}','HomeController@download');
		Route::get('/history','HomeController@userHistory')->name('home.userHistory');

		//cart
		Route::get('/export','CartController@export');
		Route::get('/cart', 'CartController@index')->name('cart.index');
		Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');
		Route::get('/cart/takeaway', 'CartController@takeaway');
		Route::get('/cart/{food}', 'CartController@add')->name('cart.add');

		Route::get('/cart/destroy/{id}', 'CartController@destroy')->name('cart.destroy');
		Route::get('/cart/update/{id}', 'CartController@update')->name('cart.update');

		Route::resource('orders', 'OrderController');
		//Route::post('comments/food_id', ['uses'=>'CommentController@store','as'=>'comment.store']);
		Route::get('/comment/{id}', 'CommentController@create')->name('cart.comment');
		Route::post('/comment/{id}', 'CommentController@store');
		
		


});


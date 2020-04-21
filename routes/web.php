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
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', array('as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'));
Route::post('password/email', array('as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'));
Route::get('password/reset/{token}', array('as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm'));
Route::post('password/reset', array('as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset'));
//Email Verification Route(s)
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('blog/{slug}', array('as'=>'blog.single','uses'=>'BlogController@getSingle'))->where('slug','[\w\d\-\_]+');
Route::get('blog', array('uses'=>'PagesController@getBlog','as'=>'blog.index'));
Route::get('popular', 'PagesController@getPopular');
Route::get('contact', 'PagesController@getContact');
Route::post('meal_category', 'PagesController@fetch')->name('autocomplete.fetch');
Route::post('search', 'PagesController@postSearch');
Route::post('contact', 'PagesController@postContact');
Route::get('about', 'PagesController@getAbout');
Route::get('deliverers', 'AdminController@getDeliverers');
Route::get('cleaners', 'AdminController@getCleaners');
Route::get('addCleaner','AdminController@addCleaner');
Route::get('addCook','AdminController@addCook');
Route::get('addDriver','AdminController@addDriver');
Route::get('cooks', 'AdminController@getCooks');
Route::get('editEmployees', 'AdminController@editEmployees');
Route::get('reports', 'AdminController@getReports');

Route::get('/', 'PagesController@getIndex');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('posts', 'PostController');
//comments
Route::post('comments/{post_id}',array('uses'=>'CommentsController@store','as'=>'comments.store'));
Route::get('comments/{id}/edit',array('uses'=>'CommentsController@edit', 'as'=>'comments.edit'));
Route::put('comments/{id}',array('uses'=>'CommentsController@update', 'as'=>'comments.update'));
Route::delete('comments/{id}',array('uses'=>'CommentsController@destroy', 'as'=>'comments.destroy'));
Route::get('comments/{id}/delete',array('uses'=>'CommentsController@delete', 'as'=>'comments.delete'));
Auth::routes(['verify'=>true]);
Route::resource('posts', 'PostController');
Route::resource('admins', 'AdminResourceController');
Route::resource('bloggers', 'BloggerResourceController');
Route::resource('meals', 'MealController');
Route::resource('employees', 'EmployeeController');
Route::resource('pending', 'PendingController');
Auth::routes();
Route::middleware('customer')->group(function(){
Route::get('/home', 'HomeController@index')->name('home');	
});
Route::middleware('admin')->group(function(){
Route::get('/admin','AdminController@index')->name('admin');
});
Route::middleware('blogger')->group(function(){
Route::get('/blogger','BloggerController@index')->name('blogger');
});
Route::middleware('superuser')->group(function(){
Route::get('/superuser','SuperuserController@index')->name('superuser');	
});
Route::get('/meals','MealController@index')->name('meals');
Route::get('/stock','AdminController@getStock');
Route::get('/manageAdmins','SuperuserController@admin')->name('manageAdmins');
Route::get('/manageBloggers','SuperuserController@blogger')->name('manageBloggers');
Route::post('/logout', 'Auth\LoginController@logout');
Route::resource('orders', 'OrdersController');
Route::get('/payment', 'PaymentsController@push')->name('payment.push');
Route::get('/pay', 'PagesController@getPayment')->name('pay');
Route::get('/complete', 'PagesController@getComplete');
Route::get('/category','PagesController@getCategory');
Route::get('/select', 'PagesController@getSelection');
Route::get('/pending', 'AdminController@getOrders');
Route::post('/mealsSelect', 'PagesController@postCategories');
Route::post('/postCheck', 'AdminController@postCheck');
Route::post('/confirmSelect', 'PagesController@postSelection');
Route::get('/profile', 'PagesController@getProfile')->name('Profile');


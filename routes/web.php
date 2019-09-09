<?php
Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('roles', 'Role\\RolesController');

// ######################Route for admin ######################
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function(){
    Route::get('dashboard','AdminController@index')->name('admin_dashboard');
    Route::get('alluser','AdminController@allUser')->name('all_user');
    Route::get('ajaxalluser','AdminController@ajaxAllUser')->name('ajax_all_user');
    Route::get('edituser','AdminController@editUser')->name('edit_user');
    Route::get('register_user','AdminController@registerUser')->name('register_user');
  

});
// ######################Route for User ######################
Route::group(['prefix'=>'user','namespace'=>'User','middleware'=>['auth','user']],function(){
     Route::get('dashboard','UserController@index')->name('user_dashboard');
});


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
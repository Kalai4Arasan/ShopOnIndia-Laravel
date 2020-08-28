<?php

Route::group(['namespace' => 'Seller'], function() {
    Route::get('/', 'HomeController@index')->name('seller.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('seller.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('seller.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('seller.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('seller.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('seller.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('seller.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('seller.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('seller.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('seller.verification.verify');

});
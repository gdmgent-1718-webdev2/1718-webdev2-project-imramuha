<?php

use Illuminate\Http\Request;

Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'Frontend\AuthController@login');
    Route::post('register', 'Frontend\AuthController@register');
    Route::post('logout', 'Frontend\AuthController@logout');
    Route::post('refresh', 'Frontend\AuthController@refresh');
    Route::post('sendPasswordResetLink', 'Frontend\ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'Frontend\ChangePasswordController@process');

    Route::post('/me', 'Frontend\AuthController@me');

    Route::get('/account/profile', 'Frontend\AccountController@showUser');
    Route::get('/account/profile/select', 'Frontend\AccountController@showUser');
    Route::post('/account/profile/edit', 'Frontend\AccountController@editUser');

    Route::post('/account/fishes/create', 'Frontend\AccountController@storeFish');
    Route::get('/account/fishes', 'Frontend\AccountController@showFishes');
    Route::get('/account/fishes/select/{id}', 'Frontend\AccountController@showFish');
    Route::post('/account/fishes/edit', 'Frontend\AccountController@editFish');
    Route::get('/account/fishes/delete/{id}', 'Frontend\AccountController@deleteFish');

    Route::post('/account/bids/create', 'Frontend\AccountController@storeBid');
    Route::get('/account/bids', 'Frontend\AccountController@showBids');
    Route::get('/account/bids/select/{id}', 'Frontend\AccountController@showBid');
    Route::post('/account/bids/edit', 'Frontend\AccountController@publishBid');
    Route::get('/account/bids/delete/{id}', 'Frontend\AccountController@deleteBid');

    Route::get('/auctions', 'Frontend\AccountController@showOngoingBids');
    Route::get('/auctions/select/{id}', 'Frontend\AccountController@showOngoingBid');
    Route::post('/auctions/raise-bid', 'Frontend\AccountController@raiseBid');

});
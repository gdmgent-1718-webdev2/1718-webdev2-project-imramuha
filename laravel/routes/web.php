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

Route::middleware(['auth:web'])->group(function () {

    Route::get('backoffice/dashboard', 'backoffice\DashboardController@index');
});

Route::group(['prefix' => 'backoffice', 'namespace' => 'Backoffice'], function () {

    // using web guard cause I set api for frontend
    Route::middleware(['auth:web'])->group(function () {



        Route::get('dashboard', [
            'uses' => 'DashboardController@index',
            'as' => 'dashboard',
        ]);
        ;


        Route::resource('customers', 'CustomerController');
        Route::resource('categories', 'CategoryController');
        Route::resource('subcategories', 'SubcategoryController');
        Route::resource('fishes', 'FishController');
        Route::resource('users', 'UserController');

        // user
        Route::get('users/{id}/delete', [
            'uses' => 'UserController@softDelete',
            'as' => 'users.softDelete',
        ]);                                    
        Route::get('users/{id}/undelete', [
            'uses' => 'UserController@softUndelete',
            'as' => 'users.softUndelete',
        ]);


        // customers
        Route::get('customers/{id}/delete', [
            'uses' => 'CustomerController@softDelete',
            'as' => 'customers.softDelete',
        ]);
        Route::get('customers/{id}/undelete', [
            'uses' => 'CustomerController@softUndelete',
            'as' => 'customers.softUndelete',
        ]);

        // fishes
        Route::get('fishes/{id}/delete', [
            'uses' => 'FishController@softDelete',
            'as' => 'fishes.softDelete',
        ]);
        Route::get('fishes/{id}/undelete', [
            'uses' => 'FishController@softUndelete',
            'as' => 'fishes.softUndelete',
        ]);

        // categories
        Route::get('categories/{id}/delete', [
            'uses' => 'CategoryController@softDelete',
            'as' => 'categories.softDelete',
        ]);
        Route::get('categories/{id}/undelete', [
            'uses' => 'CategoryController@softUndelete',
            'as' => 'categories.softUndelete',
        ]);

        // subcategories
        Route::get('subcategories/{id}/delete', [
            'uses' => 'SubcategoryController@softDelete',
            'as' => 'subcategories.softDelete',
        ]);
        Route::get('subcategories/{id}/undelete', [
            'uses' => 'SubcategoryController@softUndelete',
            'as' => 'subcategories.softUndelete',
        ]);


        // Route::get('backoffice/fishes/create','FishController@subcategories');

        // Route::resource('product-categories', 'ProductCategoryController');
        /*
        Route::get('orders', [
            'uses' => 'OrdersController@index',
            'as' => 'orders.index',
        ]);*/
    });
});

//  php artisan route:list ----- to see all routes

// Auth::routes();
Route::get('category/{category}/subcategory', 'Backoffice\CategoryController@getSubcategories');

Route::get('/admin', 'Auth\AdminController@index');

Route::get('/moderator', 'Auth\ModeratorController@index');

Route::get('/no-acces', 'Auth\NoAccesController@index');

Route::get('/', function () {
    return redirect('backoffice/dashboard');
});


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


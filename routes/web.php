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
Route::get('/debug', function () {
    $block_name = '';
    $block = Block::where('block_name', $block_name)->first();
});

Auth::routes();

Route::group(['prefix' => '/backend', 'as' => 'backoffice.', 'middleware' => ['web', 'auth', 'role:administrator|editor'], 'namespace' => '\App\Http\Controllers\BackOffice'], function () {
    Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

    Route::get('/gallery', ['as' => 'gallery', 'uses' => 'GalleryController@index']);
    Route::get('/gallery/list', ['as' => 'gallery.list_galleries', 'uses' => 'GalleryController@list_galleries']);

    Route::get('/gallery/upload', ['as' => 'gallery.upload', 'uses' => 'GalleryController@upload']);
    Route::post('/gallery/upload', ['as' => 'gallery.upload_save', 'uses' => 'GalleryController@upload_save']);

    Route::get('/gallery/create', ['as' => 'gallery.create', 'uses' => 'GalleryController@create']);
    Route::get('/gallery/{gallery}/edit', ['as' => 'gallery.edit', 'uses' => 'GalleryController@edit']);
    Route::get('/photo/{photo}/view', ['as' => 'photo.show', 'uses' => 'PhotoController@show']);
    Route::post('/photo/{photo}/delete', ['as' => 'photo.delete', 'uses' => 'PhotoController@delete']);

    Route::post('/gallery/{gallery}/edit', ['as' => 'gallery.update', 'uses' => 'GalleryController@update']);
    Route::post('/gallery', ['as' => 'gallery.store', 'uses' => 'GalleryController@store']);

    Route::get('/banners', ['as' => 'banners', 'uses' => 'BannerController@index']);
    Route::get('/banners/create', ['as' => 'banners.create', 'uses' => 'BannerController@create']);
    Route::get('/banners/{banner}/edit', ['as' => 'banners.edit', 'uses' => 'BannerController@edit']);
    Route::get('/banners/{banner}/view', ['as' => 'banners.view', 'uses' => 'BannerController@view']);
    Route::post('/banners/{banner}/edit', ['as' => 'banners.update', 'uses' => 'BannerController@update']);
    Route::post('/banners/{banner}/delete', ['as' => 'banners.delete', 'uses' => 'BannerController@delete']);
    Route::post('/banners', ['as' => 'banners.store', 'uses' => 'BannerController@store']);

    Route::get('/pages', ['as' => 'pages', 'uses' => 'PageController@index']);
    Route::get('/pages/create', ['as' => 'pages.create', 'uses' => 'PageController@create']);
    Route::get('/pages/{page}/edit', ['as' => 'pages.edit', 'uses' => 'PageController@edit']);
    Route::get('/pages/{page}/view', ['as' => 'pages.view', 'uses' => 'PageController@view']);
    Route::post('/pages/{page}/edit', ['as' => 'pages.update', 'uses' => 'PageController@update']);
    Route::post('/pages/{page}/delete', ['as' => 'pages.delete', 'uses' => 'PageController@delete']);
    Route::post('/pages', ['as' => 'pages.store', 'uses' => 'PageController@store']);
 
    Route::get('/contact', ['as' => 'contact', 'uses' => 'ContactController@index']);
    Route::get('/contact/{contact}/show', ['as' => 'contact.show', 'uses' => 'ContactController@show']);
    Route::post('/contact/{contact}/delete', ['as' => 'contact.delete', 'uses' => 'ContactController@delete']);

    Route::group(['middleware' => ['role:administrator']], function () {
        Route::get('/users', ['as' => 'users', 'uses' => 'UserController@index']);
        Route::get('/users/create', ['as' => 'users.create', 'uses' => 'UserController@create']);
        Route::post('/users/create', ['as' => 'users.store', 'uses' => 'UserController@store']);
        Route::get('/users/{user}/edit', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
        Route::post('/users/{user}/edit', ['as' => 'users.update', 'uses' => 'UserController@update']);
        Route::get('/settings', ['as' => 'settings', 'uses' => 'SettingsController@index']);
        Route::post('/settings', ['as' => 'settings.update', 'uses' => 'SettingsController@update']);
        Route::get('/blocks', ['as' => 'blocks', 'uses' => 'BlockController@index']);
        Route::get('/blocks/{block}/edit', ['as' => 'blocks.edit', 'uses' => 'BlockController@edit']);
        Route::post('/blocks/{block}/edit', ['as' => 'blocks.update', 'uses' => 'BlockController@update']);
    });

    Route::get('/profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::post('/profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);    
});

Route::group(['as' => 'frontend.', 'middleware' => ['web'], 'namespace' => '\App\Http\Controllers\Frontend'], function () {
    Route::get('/contact', ['as' => 'contact', 'uses' => 'ContactController@index']);
    Route::post('/contact', ['as' => 'contact.send', 'uses' => 'ContactController@send']);
    Route::get('/gallery', ['as' => 'gallery', 'uses' => 'GalleryController@index']);
    Route::get('/gallery/{gallery}/photos', ['as' => 'gallery.photos', 'uses' => 'GalleryController@photos']);
    Route::get('/{slug?}', ['as' => 'page', 'uses' => 'PageController@show']);
});

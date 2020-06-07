<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Website\WebsiteController@index')->name('websites.index');
Route::post('/', 'Website\WebsiteController@store')->name('websites.store');
Route::get('/{website_id}', 'Website\WebsiteController@show')->name('websites.show');
Route::patch('/{website_id}', 'Website\WebsiteController@update')->name('websites.update');
Route::delete('/{website_id}', 'Website\WebsiteController@delete')->name('websites.delete');

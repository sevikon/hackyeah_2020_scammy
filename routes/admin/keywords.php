<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Keyword\KeywordController@index')->name('keywords.index');
Route::post('/', 'Keyword\KeywordController@store')->name('keywords.store');
Route::get('/{keyword_id}', 'Keyword\KeywordController@show')->name('keywords.show');
Route::patch('/{keyword_id}', 'Keyword\KeywordController@update')->name('keywords.update');
Route::delete('/{keyword_id}', 'Keyword\KeywordController@delete')->name('keywords.delete');

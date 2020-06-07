<?php

use Illuminate\Support\Facades\Route;

Route::get('/user-roles', 'Documentation\DocumentationController@user_roles')->name('documentation.user_roles');
Route::get('/voucher-status', 'Documentation\DocumentationController@voucher_statuses')->name('documentation.voucher_statuses');
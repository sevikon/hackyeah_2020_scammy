<?php

use Illuminate\Support\Facades\Route;

Route::post('/', 'Guest\GuestVouchersController@store')->name('guest_vouchers.store');
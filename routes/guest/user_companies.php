<?php

use Illuminate\Support\Facades\Route;

Route::get('/{company_id}', 'Guest\GuestUserCompaniesController@show')->name('guest_companies.show');
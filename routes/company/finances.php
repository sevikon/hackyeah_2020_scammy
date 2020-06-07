<?php

use Illuminate\Support\Facades\Route;

Route::get('/vouchers', 'Company\CompanyFinancesController@vouchers')->name('company_finances.vouchers');
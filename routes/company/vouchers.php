<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Company\CompanyVouchersController@index')->name('company_vouchers.index');
Route::get('/{voucher_id}', 'Company\CompanyVouchersController@show')->name('company_vouchers.show');
Route::match(['put', 'patch'], '/{voucher_id}', 'Company\CompanyVouchersController@update')->name('company_vouchers.update');
Route::delete('/{voucher_id}', 'Company\CompanyVouchersController@delete')->name('company_vouchers.delete');
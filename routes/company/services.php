<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Company\CompanyServicesController@index')->name('company_services.index');
Route::post('/', 'Company\CompanyServicesController@store')->name('company_services.store');
Route::get('/{service_id}', 'Company\CompanyServicesController@show')->name('company_services.show');
Route::get('/{service_id}/voucher-statistics', 'Company\CompanyServicesController@voucher_statistics')->name('company_services.voucher_statistics');
Route::match(['put', 'patch'], '/{service_id}', 'Company\CompanyServicesController@update')->name('company_services.update');
Route::delete('/{service_id}', 'Company\CompanyServicesController@delete')->name('company_services.delete');
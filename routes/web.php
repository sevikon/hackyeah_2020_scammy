<?php

use Mpociot\ApiDoc\ApiDoc;

$spa = function () {
    return view('app');
};

if (env('APP_ENV') === 'local') {
    ApiDoc::routes("/apidoc");
    Route::prefix('documentation')
        ->group(base_path('routes/documentation/documentation.php'));
}

/**
 * Since the forgot password functionality requires a named route, create a
 * named route specifically for that here.
 */
Route::get('reset-password/{token}', $spa)->name('password.reset');

/**
 * Catchall route for the single page application
 */
Route::get('/{view?}', $spa)->where('view', '(.*)')->name('catchall');
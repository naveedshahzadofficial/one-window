<?php

use Illuminate\Support\Facades\Route;


Route::get('/{any}', function () {
    return view('_layouts/frontend/vue');
})->where('any', '^(?!api).*$')->where('any', '^(?!admin).*$');
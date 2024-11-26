<?php

use Botble\BackToTop\Http\Controllers\Settings\BackToTopSettingController;
use Botble\Base\Facades\BaseHelper;
use Illuminate\Support\Facades\Route;

Route::prefix(BaseHelper::getAdminPrefix() . '/floating-buttons')
    ->name('back-to-top.settings')
    ->middleware(['core', 'web', 'auth'])
    ->group(function () {
        Route::group(['permission' => 'back-to-top.settings'], function () {
            Route::get('/', [BackToTopSettingController::class, 'edit']);
            Route::put('/', [BackToTopSettingController::class, 'update'])->name('.update');
        });
    });

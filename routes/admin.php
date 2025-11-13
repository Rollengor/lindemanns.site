<?php

use Illuminate\Support\Facades\Route;

/* Main */
Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.main');

/* Profile */
Route::group([
    'middleware' => [\Spatie\Permission\Middleware\RoleOrPermissionMiddleware::using([\App\Enums\RolesEnum::SUPERADMIN->value, \App\Enums\RolesEnum::ADMIN->value])],
    'prefix' => 'profile'
], function () {

    Route::get('/', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile');
    Route::get('/password', [\App\Http\Controllers\Admin\ProfileController::class, 'password'])->name('admin.password');

});

/* Managers */
Route::group([
    'middleware' => [\Spatie\Permission\Middleware\RoleOrPermissionMiddleware::using([\App\Enums\RolesEnum::SUPERADMIN->value, \App\Enums\RolesEnum::ADMIN->value])],
    'prefix' => 'managers'
], function () {

    Route::get('/', [\App\Http\Controllers\Admin\ManagerController::class, 'index'])->name('admin.manager');

    Route::get('/create', [\App\Http\Controllers\Admin\ManagerController::class, 'create'])->name('admin.manager.create');
    Route::post('/store', [\App\Http\Controllers\Admin\ManagerController::class, 'store'])->name('admin.manager.store');
    Route::get('/{user}/edit', [\App\Http\Controllers\Admin\ManagerController::class, 'edit'])->name('admin.manager.edit');
    Route::patch('/{user}/update', [\App\Http\Controllers\Admin\ManagerController::class, 'update'])->name('admin.manager.update');
    Route::delete('/{user}/delete', [\App\Http\Controllers\Admin\ManagerController::class, 'delete'])->name('admin.manager.delete');

});

Route::group([
    'middleware' => [\Spatie\Permission\Middleware\RoleOrPermissionMiddleware::using([\App\Enums\PermissionsEnum::CANALL->value])]
], function () {

    /*Route::get('/wysiwyg', [\App\Http\Controllers\Admin\WysiwygController::class, 'index'])->name('admin.wysiwyg');*/

    Route::group(['prefix' => 'home'], function () {

        Route::get('/', [\App\Http\Controllers\Admin\HomePageController::class, 'index'])->name('admin.home.page');

        Route::patch('/{page}/update', [\App\Http\Controllers\Admin\HomePageController::class, 'update'])->name('admin.home.page.update');

    });

    Route::group(['prefix' => 'delete'], function () {

        Route::get('/', [\App\Http\Controllers\Admin\DeleteModalController::class, 'show'])->name('admin.confirm-delete-modal');

    });

    /*Route::group(['prefix' => 'faq'], function () {

        Route::get('/', [\App\Http\Controllers\Admin\FAQController::class, 'index'])->name('admin.faq');

        Route::get('/create', [\App\Http\Controllers\Admin\FAQController::class, 'create'])->name('admin.faq.create');
        Route::post('/store', [\App\Http\Controllers\Admin\FAQController::class, 'store'])->name('admin.faq.store');
        Route::get('/{faq}/edit', [\App\Http\Controllers\Admin\FAQController::class, 'edit'])->name('admin.faq.edit');
        Route::patch('/{faq}/update', [\App\Http\Controllers\Admin\FAQController::class, 'update'])->name('admin.faq.update');
        Route::delete('/{faq}/delete', [\App\Http\Controllers\Admin\FAQController::class, 'delete'])->name('admin.faq.delete');

    });*/

});

/*Route::group([
    'middleware' => [\Spatie\Permission\Middleware\RoleOrPermissionMiddleware::using([\App\Enums\RolesEnum::SUPERADMIN->value, \App\Enums\RolesEnum::ADMIN->value])],
    'prefix' => 'settings'
], function () {

    Route::get('/', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin.settings');

    Route::patch('/email/{setting}', [\App\Http\Controllers\Admin\SettingsController::class, 'updateEmail'])->name('admin.settings.email.update');

});*/

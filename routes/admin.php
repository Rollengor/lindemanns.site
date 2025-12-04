<?php

use Illuminate\Support\Facades\Route;

/* Upload File */
Route::post('/upload-image', [\App\Http\Controllers\Admin\ImageUploadController::class, 'store'])->name('admin.image.upload');

/* Main */
Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.main');

/* UI */
Route::get('/ui', [\App\Http\Controllers\Admin\UIController::class, 'index'])->name('admin.ui');

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

    Route::group(['prefix' => 'home'], function () {

        Route::get('/', [\App\Http\Controllers\Admin\HomePageController::class, 'index'])->name('admin.home.page');
        Route::patch('/{page}/update', [\App\Http\Controllers\Admin\HomePageController::class, 'update'])->name('admin.home.page.update');

    });

    Route::group(['prefix' => 'news'], function () {

        Route::get('/', [\App\Http\Controllers\Admin\News\PageController::class, 'index'])->name('admin.news.page');
        Route::patch('/{page}/update', [\App\Http\Controllers\Admin\News\PageController::class, 'update'])->name('admin.news.page.update');

        Route::group(['prefix' => 'categories'], function () {

            Route::get('/', [\App\Http\Controllers\Admin\News\CategoryController::class, 'index'])->name('admin.news.categories');

            Route::get('/create', [\App\Http\Controllers\Admin\News\CategoryController::class, 'create'])->name('admin.news.category.create');
            Route::post('/store', [\App\Http\Controllers\Admin\News\CategoryController::class, 'store'])->name('admin.news.category.store');
            Route::get('/{newsCategory}/edit', [\App\Http\Controllers\Admin\News\CategoryController::class, 'edit'])->name('admin.news.category.edit');
            Route::patch('/{newsCategory}/update', [\App\Http\Controllers\Admin\News\CategoryController::class, 'update'])->name('admin.news.category.update');
            Route::delete('/{newsCategory}/delete', [\App\Http\Controllers\Admin\News\CategoryController::class, 'delete'])->name('admin.news.category.delete');

        });

        Route::group(['prefix' => 'articles'], function () {

            Route::get('/', [\App\Http\Controllers\Admin\News\ArticleController::class, 'index'])->name('admin.news.articles');

            Route::get('/create', [\App\Http\Controllers\Admin\News\ArticleController::class, 'create'])->name('admin.news.article.create');
            Route::post('/store', [\App\Http\Controllers\Admin\News\ArticleController::class, 'store'])->name('admin.news.article.store');
            Route::get('/{newsArticle}/edit', [\App\Http\Controllers\Admin\News\ArticleController::class, 'edit'])->name('admin.news.article.edit');
            Route::patch('/{newsArticle}/update', [\App\Http\Controllers\Admin\News\ArticleController::class, 'update'])->name('admin.news.article.update');
            Route::delete('/{newsArticle}/delete', [\App\Http\Controllers\Admin\News\ArticleController::class, 'delete'])->name('admin.news.article.delete');

        });

    });

    Route::group(['prefix' => 'delete'], function () {

        Route::get('/', [\App\Http\Controllers\Admin\DeleteModalController::class, 'show'])->name('admin.confirm-delete-modal');

    });
});

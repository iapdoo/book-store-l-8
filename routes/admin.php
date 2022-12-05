<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Product\ProductController;


Route::prefix('admin')->group(function () {

    ############ Start   Admin Login #################
    Route::get('login', [AuthAdminController::class, 'login']);
    Route::post('login', [AuthAdminController::class, 'dologin'])->name('admin.dologin');

    ############ End   Admin Login #################
});

Route::middleware(['auth:admin', 'web'])->group(function () {
    Route::get('/adminpanel', [AdminController::class , 'index']);
    Route::get('/users', [AdminController::class , 'getUser'])->name('users');
    Route::get('users/{id}/edit', [AdminController::class , 'edit']);
    Route::put('users/{id}', [AdminController::class , 'update']);
    Route::delete('users/{id}', [AdminController::class , 'destroy']);
    Route::get('/users/create', [AdminController::class , 'create'])->name('users.create');
    Route::post('/users/create', [AdminController::class , 'store'])->name('users.store');
    //contact route admin

    Route::get('contact/showindex',[ContactController::class , 'ShowIndex'])->name('contact.showindex');
    Route::delete('contact/{id}',[ContactController::class , 'destroy']);
    //category route

    Route::resource('category',CategoryController::class);
    //category product
    Route::resource('product',ProductController::class);

    Route::post('add_product/{category_id}',[CategoryController::class , 'add_product']);
//settings
    Route::get('settings',[SiteSettingController::class , 'setting']);
    Route::post('settings',[SiteSettingController::class , 'setting_save']);
});

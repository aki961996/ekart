<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\User\HomepageController;
use Illuminate\Support\Facades\Route;
//main route
Route::name('admin.')->group(function () {
    Route::get('admin/login', [LoginController::class, 'login'])->name('login');
    Route::post('admin/do-login', [LoginController::class, 'doLogin'])->name('do.login');

    //middelware
    Route::middleware('auth:admin')->group(function () {
        Route::get('admin/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


        // employees  //this is calls apis ajax
        Route::name('employees.')->prefix('admin/employees')->group(function () {
            Route::get('/', [EmployeesController::class, 'employees'])->name('employees');
            Route::post('save', [EmployeesController::class, 'save'])->name('save');
            Route::post('fetch-designation', [EmployeesController::class, 'fetchDesignation'])->name('fetch-designation');
            Route::get('edit-employees/{id}', [EmployeesController::class, 'editEmployees'])->name('edit-employees');
            Route::post('update-employees', [EmployeesController::class, 'updateEmployees'])->name('update-employees');
        });

        // members  //this is calls apis ajax
        Route::name('members.')->prefix('admin/members')->group(function () {
            Route::get('/', [MemberController::class, 'index'])->name('members');
            Route::post('store', [MemberController::class, 'store'])->name('store');
            Route::post('edit', [MemberController::class, 'edit'])->name('edit');
            Route::post('delete', [MemberController::class, 'destroy'])->name('delete');
        });

        //route grouping product normal
        Route::name('product.')->prefix('admin/products')->group(function () {
            Route::get('/', [ProductController::class, 'products'])->name('list');
            Route::get('create', [ProductController::class, 'create'])->name('create');
            Route::post('save', [ProductController::class, 'save'])->name('save');
            Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::post('update', [ProductController::class, 'update'])->name('update');
        });

        //demo
        Route::name('demo.')->prefix('admin/demo')->group(function () {
            Route::get('/', [DemoController::class, 'index'])->name('demo');
            // Route::post('store', [MemberController::class, 'store'])->name('store');
            Route::post('store', [DemoController::class, 'store'])->name('store');
        });
    });
});

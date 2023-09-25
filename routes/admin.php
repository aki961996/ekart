<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TodoController;
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


        //employees api
        Route::name('employees.')->prefix('admin/employees')->group(function () {
            Route::get('/', [EmployeeController::class, 'index'])->name('employees');
            Route::post('save', [EmployeeController::class, 'save'])->name('save');
            Route::post('fetchDesignation', [EmployeeController::class, 'fetchDesignation'])->name('fetchDesignation');
        });


        // members  //this is calls apis ajax ajax
        Route::name('members.')->prefix('admin/members')->group(function () {
            Route::get('/', [MemberController::class, 'index'])->name('members');
            Route::post('store', [MemberController::class, 'store'])->name('store');
            Route::post('edit', [MemberController::class, 'edit'])->name('edit');
            Route::post('delete', [MemberController::class, 'destroy'])->name('delete');
        });

        // todo api ajax
        Route::name('todos.')->prefix('admin/todos')->group(function () {
            Route::get('/', [TodoController::class, 'index'])->name('todos');
            // Route::get('todo', [TodoController::class, 'store'])->name('store');
        });

        // students routes
        Route::name('students.')->prefix('admin/students')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('students');
            Route::get('store', [StudentController::class, 'store'])->name('store');
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
        //route grouping  post
        Route::name('post.')->prefix('admin')->group(function () {
            Route::get('posts', [PostController::class, 'index'])->name('index');
            Route::get('category_data', [PostController::class, 'category_data'])->name('category_data');
        });

        // profile

        Route::name('profile.')->prefix('admin/profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('edit');
        });


        //demo
        Route::name('demo.')->prefix('admin/demo')->group(function () {
            Route::get('/', [DemoController::class, 'index'])->name('demo');
            // Route::post('store', [MemberController::class, 'store'])->name('store');
            Route::post('store', [DemoController::class, 'store'])->name('store');
        });
    });
});

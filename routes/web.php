<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\Error\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\VirtualTeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/config', [ConfigController::class, 'index'])->name('config');
Route::put('/config/update/{id}', [ConfigController::class, 'update'])->name('config.update');

Route::group(['namespace' => 'App\Http\Controllers\Profile'], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update/profile/{id}', [ProfileController::class, 'updateProfile'])->name('profile.update.profile');
    Route::put('/profile/update/password/{id}', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::put('/profile/update/avatar/{id}', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
});

Route::group(['namespace' => 'App\Http\Controllers\Error'], function () {
    Route::get('/unauthorized', [ErrorController::class, 'unauthorized'])->name('unauthorized');
});

Route::group(['namespace' => 'App\Http\Controllers\User'], function () {
    // Users
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/edit/password/{id}', [UserController::class, 'editPassword'])->name('user.edit.password');
    Route::put('/user/update/password/{id}', [UserController::class, 'updatePassword'])->name('user.update.password');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    // Roles
    Route::get('/role', [RoleController::class, 'index'])->name('role');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/role/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::get('/role/show/{id}', [RoleController::class, 'show'])->name('role.show');
    Route::get('/role/destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

    // Estudante
    Route::get('/my/courses', [UserController::class, 'index'])->name('student.courses');
    Route::get('/my/learning/plan', [UserController::class, 'index'])->name('student.learning.plan');
});

// Bot Routes
Route::match(['get', 'post'], '/botman', [VirtualTeacherController::class, 'handle']);
Route::get('/bot/tinker', [VirtualTeacherController::class, 'tinker'])->name('bot.tinker');

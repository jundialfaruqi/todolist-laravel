<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard;
use App\Livewire\Tasks\TaskIndex;
use App\Livewire\Tasks\TaskCreate;
use App\Livewire\Tasks\TaskEdit;
use App\Livewire\Admin\UserIndex;
use App\Livewire\Admin\RoleIndex;
use App\Livewire\Admin\RoleCreate;
use App\Livewire\Admin\RoleEdit;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    // Task Routes
    Route::get('/tasks', TaskIndex::class)->name('tasks.index');
    Route::get('/tasks/create', TaskCreate::class)->name('tasks.create');
    Route::get('/tasks/{task}/edit', TaskEdit::class)->name('tasks.edit');

    // Admin Routes (Role & Permission Management)
    Route::middleware('can:manage users')->group(function () {
        Route::get('/admin/users', UserIndex::class)->name('users.index');
    });

    Route::middleware('can:manage roles')->group(function () {
        Route::get('/admin/roles', RoleIndex::class)->name('roles.index');
        Route::get('/admin/roles/create', RoleCreate::class)->name('roles.create');
        Route::get('/admin/roles/{role}/edit', RoleEdit::class)->name('roles.edit');
    });

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});

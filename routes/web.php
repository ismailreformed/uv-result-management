<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        // If the user is already authenticated, you can redirect them to a different page, for example, the dashboard.
        return redirect('/dashboard');
    } else {
        // If the user is not authenticated, redirect to the login page.
        return redirect('/login');
    }
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/faculties', function () {
        return view('faculty');
    })->name('faculties');

    Route::get('/departments', function () {
        return view('department');
    })->name('departments');

    Route::get('/subjects', function () {
        return view('subject');
    })->name('subjects');
});

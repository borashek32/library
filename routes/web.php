<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Categories;
use App\Http\Controllers\Admin\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\LibraryController::class, 'categories'])->name('categories');
Route::get('/category/{id}', [\App\Http\Controllers\LibraryController::class, 'category'])->name('category');
Route::get('/post/{id}', [\App\Http\Controllers\LibraryController::class, 'post'])->name('post');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Admin dashboard
Route::get('/dashboard/admin/categories', Categories::class)->name('cats');
Route::resource('/dashboard/admin/posts', \App\Http\Controllers\Admin\PostController::class);
Route::resource('/dashboard/admin/mailings', SubscriptionController::class);
Route::get('/dashboard/admin/mailings-category/{id}', [SubscriptionController::class, 'subscriptionsCategory'])
    ->name('subscriptions-category');

// User dashboard
Route::resource('/dashboard/subscriptions', \App\Http\Controllers\SubscriptionController::class);

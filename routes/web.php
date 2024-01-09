<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
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

Route::view('/', 'welcome');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('pages', PageController::class)
        ->except(['show']);
    });
});

Route::middleware(['auth', 'editor'])->group(function () {
    Route::get('/editor-dashboard', [EditorController::class, 'index'])->name('editor-dashboard');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';

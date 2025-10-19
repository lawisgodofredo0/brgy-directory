<?php
use App\Http\Controllers\OfficialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('home.index');
})->name('home');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
// Public-facing
Route::get('/officials', [OfficialController::class, 'index'])->name('officials.index');
Route::get('/officials/{official}', [OfficialController::class, 'show'])->name('officials.show');

// Admin group: ensure you have 'auth' and 'admin' middleware registered
Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {
Route::resource('officials', OfficialController::class)->except(['index','show']);
});
// Public
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

// Admin (protected)
Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('services', ServiceController::class)->except(['index','show']);
});
<?php
use App\Http\Controllers\OfficialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\OfficialsController;

Route::get('/', function () {
    return view('home.index');
})->name('home');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
// Public-facing
Route::get('/officials', [OfficialController::class, 'index'])->name('officials.index');
Route::get('/officials/{official}', [OfficialController::class, 'show'])->name('officials.show');

// Public
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

Route::prefix('admin')->group(function () {
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register.post');

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        // Admin-only management pages
        Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
        Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
        Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
        Route::put('/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
        Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

        Route::get('/officials', [OfficialController::class, 'index'])->name('admin.officials.index');
        Route::get('/officials/create', [OfficialController::class, 'create'])->name('admin.officials.create');
        Route::post('/officials', [OfficialController::class, 'store'])->name('admin.officials.store');
        Route::get('/officials/{official}/edit', [OfficialController::class, 'edit'])->name('admin.officials.edit');
        Route::put('/officials/{official}', [OfficialController::class, 'update'])->name('admin.officials.update');
        Route::delete('/officials/{official}', [OfficialController::class, 'destroy'])->name('admin.officials.destroy');
    });
});
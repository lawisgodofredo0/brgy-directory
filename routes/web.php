<?php
use App\Http\Controllers\OfficialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\OfficialsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\Admin;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;

// 🧩 Admin Forgot Password (Request Form)
Route::get('/forgot-password', function () {
    return view('forgot-password');
})->middleware('guest:admin')->name('admin.password.request');

// 🧩 Admin Forgot Password (Send Reset Link)
// 🟢 Send Reset Link Email
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    // ✅ Create a reset token manually for local testing
    $admin = \App\Models\Admin::where('email', $request->email)->first();

    if (!$admin) {
        return back()->withErrors(['email' => 'Admin email not found.']);
    }

    $token = app('auth.password.broker')->createToken($admin);

    // Store token in session so the Blade can access it
    session(['reset_token' => $token, 'reset_email' => $admin->email]);

    return back()->with('status', 'Reset link generated successfully!');
})->middleware('guest:admin')->name('admin.password.email');


// 🧩 Admin Reset Password (Form)
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->middleware('guest:admin')
    ->name('admin.password.reset');

// 🧩 Admin Reset Password (Submit)
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->middleware('guest:admin')
    ->name('admin.password.update');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
    ]);

    $status = Password::broker('admins')->reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (Admin $admin, string $password) {
            $admin->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));

            $admin->save();

            event(new PasswordReset($admin));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('admin.login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest:admin')->name('admin.password.update');


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
        Route::get('/services', [ServicesController::class, 'index'])->name('admin.services.index');
        Route::get('/services/create', [ServicesController::class, 'create'])->name('admin.services.create');
        Route::post('/services', [ServicesController::class, 'store'])->name('admin.services.store');
        Route::get('/services/{service}/edit', [ServicesController::class, 'edit'])->name('admin.services.edit');
        Route::put('/services/{service}', [ServicesController::class, 'update'])->name('admin.services.update');
        Route::delete('/services/{service}', [ServicesController::class, 'destroy'])->name('admin.services.destroy');

        Route::get('/officials', [OfficialsController::class, 'index'])->name('admin.officials.index');
        Route::get('/officials/create', [OfficialsController::class, 'create'])->name('admin.officials.create');
        Route::post('/officials', [OfficialsController::class, 'store'])->name('admin.officials.store');
        Route::get('/officials/{official}/edit', [OfficialsController::class, 'edit'])->name('admin.officials.edit');
        Route::put('/officials/{official}', [OfficialsController::class, 'update'])->name('admin.officials.update');
        Route::delete('/officials/{official}', [OfficialsController::class, 'destroy'])->name('admin.officials.destroy');
    });
});
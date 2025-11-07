<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        return view('reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

$status = Password::broker('admins')->reset( // ✅ specify broker
    $request->only('email', 'password', 'password_confirmation', 'token'),
    function ($user) use ($request) {
        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));
    }
);

return $status === Password::PASSWORD_RESET
    ? redirect()->route('admin.auth.login')->with('status', 'Password successfully reset!')
    : back()->withErrors(['email' => [__($status)]]);

    }
}

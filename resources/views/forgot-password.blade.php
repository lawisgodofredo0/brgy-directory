@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4 text-success fw-bold">Admin Forgot Password</h2>

    {{-- ✅ Success Message --}}
    @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    @endif

    {{-- ❌ Error Messages --}}
    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.password.email') }}" style="max-width:400px; margin:auto;">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Email address</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="admin@example.com" required autofocus>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-3">Send Reset Link</button>

        {{-- 🧩 Show Reset Password Link if token exists --}}
        @if (session('reset_token') && session('reset_email'))
            <div class="text-center">
                <a href="{{ url('/reset-password/' . session('reset_token') . '?email=' . session('reset_email')) }}"
                   class="text-decoration-none text-success fw-semibold">
                    🔗 Go to Reset Password Page
                </a>
            </div>
        @endif
    </form>
</div>
@endsection

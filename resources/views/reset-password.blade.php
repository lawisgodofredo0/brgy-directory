@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3 class="text-center mb-3 text-success">Admin Reset Password</h3>

        {{-- ✅ Success Alert --}}
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>✅ {{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- ❌ Error Messages --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    value="{{ request()->email }}" 
                    required 
                    autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">New Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Reset Password</button>
        </form>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h2 class="mb-4 text-center text-success fw-bold">Admin Login</h2>

  {{-- ✅ Success alert (e.g., after password reset) --}}
  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>✅ {{ session('status') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- ❌ Error messages --}}
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

  <form method="POST" action="{{ route('admin.login.post') }}" class="p-4 shadow-sm rounded bg-light">
    @csrf

    <div class="mb-3">
      <label for="email" class="form-label fw-semibold">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control" required autofocus>
    </div>

    <div class="mb-4">
      <label for="password" class="form-label fw-semibold">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control" required>
    </div>
    
    <div class="d-flex justify-content-between align-items-center">
      <button type="submit" class="btn btn-success px-4">Login</button>

      {{-- 🔗 Forgot Password link (fixed route) --}}
      <a href="{{ route('admin.password.request') }}" class="text-decoration-none text-success fw-semibold">
        Forgot Password?
      </a>
    </div>
  </form>
</div>
@endsection

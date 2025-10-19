@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h2>Admin Login</h2>
  <form method="POST" action="{{ route('admin.login.post') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" class="form-control mb-2">
    <input type="password" name="password" placeholder="Password" class="form-control mb-2">
    <button type="submit" class="btn btn-success">Login</button>
  </form>
</div>
@endsection

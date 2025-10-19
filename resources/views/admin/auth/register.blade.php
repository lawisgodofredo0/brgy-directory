@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <h2>Admin Register</h2>
  <form method="POST" action="{{ route('admin.register.post') }}">
    @csrf
    <input type="text" name="name" placeholder="Name" class="form-control mb-2">
    <input type="email" name="email" placeholder="Email" class="form-control mb-2">
    <input type="password" name="password" placeholder="Password" class="form-control mb-2">
    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control mb-2">
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>
@endsection

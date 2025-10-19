<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">Welcome, Admin!</h2>

        <div class="text-center">
            <p>You are now logged in as <strong>{{ auth('admin')->user()->name }}</strong>.</p>
            <a href="{{ route('admin.services.index') }}" class="btn btn-primary mt-3">Manage Services</a>
            <a href="{{ route('admin.officials.index') }}" class="btn btn-secondary mt-3">Manage Officials</a>
        </div>
    </div>
</div>
@endsection

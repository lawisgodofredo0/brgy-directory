{{-- resources/views/admin/dashboard.blade.php --}}
@extends('admin.layout')

@section('title', 'Admin Dashboard – Barangay Balintawak')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow p-4 border-0 rounded-3">
        <h2 class="text-center text-success mb-4 fw-bold">Welcome, Admin!</h2>

        <div class="text-center">
            <p class="lead">
                You are now logged in as 
                <strong class="text-primary">{{ auth('admin')->user()->name }}</strong>.
            </p>

            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="{{ route('admin.services.index') }}" class="btn btn-success px-4 py-2">
                    ⚙️ Manage Services
                </a>
<a href="{{ route('admin.officials.index') }}" class="btn btn-primary px-4 py-2">
    👥 Manage Officials
</a>

            </div>
        </div>
    </div>
</div>
@endsection

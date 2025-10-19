@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Edit Official</h2>
  <form action="{{ route('admin.officials.update', $official) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">First name</label>
      <input class="form-control" name="first_name" value="{{ old('first_name', $official->first_name) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Last name</label>
      <input class="form-control" name="last_name" value="{{ old('last_name', $official->last_name) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Position</label>
      <input class="form-control" name="position" value="{{ old('position', $official->position) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Phone</label>
      <input class="form-control" name="phone" value="{{ old('phone', $official->phone) }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="email" value="{{ old('email', $official->email) }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Responsibilities</label>
      <textarea class="form-control" name="responsibilities" rows="4">{{ old('responsibilities', $official->responsibilities) }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Photo (optional)</label>
      <input type="file" class="form-control" name="photo" accept="image/*">
      @if($official->photo)
        <small class="text-muted">Current: <a href="{{ asset('storage/'.$official->photo) }}" target="_blank">view</a></small>
      @endif
    </div>

    <button class="btn btn-primary">Update</button>
  </form>
</div>
@endsection

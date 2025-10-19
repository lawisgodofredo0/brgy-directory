@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Create Official</h2>
  <form action="{{ route('admin.officials.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label class="form-label">First name</label>
      <input class="form-control" name="first_name" value="{{ old('first_name') }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Last name</label>
      <input class="form-control" name="last_name" value="{{ old('last_name') }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Position</label>
      <input class="form-control" name="position" value="{{ old('position') }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Phone</label>
      <input class="form-control" name="phone" value="{{ old('phone') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Responsibilities</label>
      <textarea class="form-control" name="responsibilities" rows="4">{{ old('responsibilities') }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Photo (optional)</label>
      <input type="file" class="form-control" name="photo" accept="image/*">
    </div>

    <button class="btn btn-primary">Save</button>
  </form>
</div>
@endsection

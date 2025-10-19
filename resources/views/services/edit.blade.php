@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Edit Service</h2>
  <form action="{{ route('admin.services.update', $service) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Service Name</label>
      <input class="form-control" name="name" value="{{ old('name', $service->name) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea class="form-control" name="description" rows="4">{{ old('description', $service->description) }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Official in charge (optional)</label>
      <select class="form-select" name="official_id">
        <option value="">-- Select Official --</option>
        @foreach($officials as $official)
          <option value="{{ $official->id }}" {{ $service->official_id == $official->id ? 'selected' : '' }}>
            {{ $official->full_name }} — {{ $official->position }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Office hours</label>
      <input class="form-control" name="office_hours" value="{{ old('office_hours', $service->office_hours) }}">
    </div>

    <button class="btn btn-primary">Update</button>
  </form>
</div>
@endsection

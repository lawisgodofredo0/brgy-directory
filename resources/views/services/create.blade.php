@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Create Service</h2>
  <form action="{{ route('admin.services.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label class="form-label">Service Name</label>
      <input class="form-control" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Official in charge (optional)</label>
      <select class="form-select" name="official_id">
        <option value="">-- Select Official --</option>
        @foreach($officials as $official)
          <option value="{{ $official->id }}">{{ $official->full_name }} — {{ $official->position }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Office hours</label>
      <input class="form-control" name="office_hours" value="{{ old('office_hours') }}">
    </div>

    <button class="btn btn-primary">Save</button>
  </form>
</div>
@endsection

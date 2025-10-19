@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Barangay Services</h2>
  <div class="list-group">
    @foreach($services as $service)
      <a href="{{ route('services.show', $service) }}" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">{{ $service->name }}</h5>
          <small>{{ $service->office_hours }}</small>
        </div>
        <p class="mb-1">{{ Str::limit($service->description, 140) }}</p>
        <small>Handled by: {{ $service->official ? $service->official->full_name . ' (' . $service->official->position . ')' : 'N/A' }}</small>
      </a>
    @endforeach
  </div>
</div>
@endsection

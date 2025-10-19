@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ route('services.index') }}" class="btn btn-link mb-3">&larr; Back to services</a>

  <div class="card">
    <div class="card-body">
      <h3>{{ $service->name }}</h3>
      <p class="mb-1"><strong>Office hours:</strong> {{ $service->office_hours ?? 'N/A' }}</p>
      <p class="mb-3">{{ $service->description }}</p>

      <p><strong>In charge:</strong>
        @if($service->official)
          <a href="{{ route('officials.show', $service->official) }}">{{ $service->official->full_name }} ({{ $service->official->position }})</a>
        @else
          N/A
        @endif
      </p>
    </div>
  </div>
</div>
@endsection

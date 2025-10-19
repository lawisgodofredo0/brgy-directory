@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ url()->previous() }}" class="btn btn-link mb-3">&larr; Back</a>

  <div class="card">
    <div class="row g-0">
      @if($official->photo)
        <div class="col-md-3">
          <img src="{{ asset('storage/'.$official->photo) }}" class="img-fluid rounded-start" alt="Photo">
        </div>
      @endif
      <div class="col-md-9">
        <div class="card-body">
          <h3>{{ $official->full_name }}</h3>
          <p><strong>{{ $official->position }}</strong></p>
          <p><strong>Contact:</strong> {{ $official->phone ?? 'N/A' }} / {{ $official->email ?? 'N/A' }}</p>
          <p><strong>Responsibilities:</strong><br>{!! nl2br(e($official->responsibilities)) !!}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

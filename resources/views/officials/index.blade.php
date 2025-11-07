{{-- resources/views/officials/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-success">Barangay Officials</h1>

    <div class="row">
        @foreach ($officials as $official)
            <div class="col-md-4 mb-4" data-aos="fade-up">
                <div class="card shadow-sm h-100">
                    @if($official->photo)
                        <img src="{{ asset('storage/' . $official->photo) }}"
                             class="card-img-top"
                             alt="{{ $official->first_name }} {{ $official->last_name }}"
                             style="height: 250px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}"
                             class="card-img-top"
                             alt="Default"
                             style="height: 250px; object-fit: cover;">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">
                            {{ $official->first_name }} {{ $official->last_name }}
                        </h5>
                        <p class="text-muted">{{ $official->position }}</p>
                        <p>📞 {{ $official->phone ?? 'N/A' }}</p>
                        <p>📧 {{ $official->email ?? 'N/A' }}</p>
                        <p class="small text-secondary">{{ $official->responsibilities }}</p>

                        <a href="{{ route('officials.show', $official->id) }}"
                           class="btn btn-outline-success btn-sm mt-2">
                            View Profile
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

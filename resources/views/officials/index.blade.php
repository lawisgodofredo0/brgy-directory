@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-success">Barangay Officials</h1>

    <div class="row">
        @foreach ($officials as $official)
            <div class="col-md-4 mb-4" data-aos="fade-up">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ $official->name }}</h5>
                        <p class="text-muted">{{ $official->position }}</p>
                        <p>📞 {{ $official->contact }}</p>
                        <p class="small">{{ $official->responsibilities }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

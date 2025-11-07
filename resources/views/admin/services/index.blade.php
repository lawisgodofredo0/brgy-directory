@extends('admin.layout')

@section('content')
<div class="container">
    <h2 class="mb-4">Manage Services</h2>

    <a href="{{ route('admin.services.create') }}" class="btn btn-primary mb-3">+ Add Service</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Service Name</th>
                <th>Description</th>
                <th>Responsible Official</th>
                <th>Office Hours</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ Str::limit($service->description, 50) }}</td>
                    <td>
                        @if($service->official)
                            {{ $service->official->first_name }} {{ $service->official->last_name }}
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td>{{ $service->office_hours ?? '—' }}</td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this service?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No services found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@extends('admin.layout')

@section('content')
<div class="container">
  <h3 class="mb-4">Manage Officials</h3>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <a href="{{ route('admin.officials.create') }}" class="btn btn-primary mb-3">+ Add Official</a>

  <table class="table table-bordered align-middle text-center">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>Photo</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Position</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($officials as $official)
        <tr>
          <td>{{ $loop->iteration }}</td>

          {{-- ✅ Display photo --}}
          <td>
            @if($official->photo)
              <img src="{{ asset('storage/' . $official->photo) }}" 
                   alt="{{ $official->first_name }}" 
                   width="70" height="70"
                   style="object-fit: cover; border-radius: 50%;">
            @else
              <span class="text-muted">No Photo</span>
            @endif
          </td>

          <td>{{ $official->first_name }}</td>
          <td>{{ $official->last_name }}</td>
          <td>{{ $official->position }}</td>
          <td>{{ $official->phone }}</td>
          <td>{{ $official->email }}</td>
          <td>
            <a href="{{ route('admin.officials.edit', $official) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('admin.officials.destroy', $official) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

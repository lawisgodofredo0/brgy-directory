<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Service – Barangay Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="card shadow p-4">
      <h2 class="mb-4">Edit Service</h2>
      <a href="{{ route('admin.services.index') }}" class="btn btn-secondary mb-3">Back to List</a>

      <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label">Service Name*</label>
          <input type="text" name="name" id="name" class="form-control" value="{{ $service->name }}" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea name="description" id="description" class="form-control" rows="4">{{ $service->description }}</textarea>
        </div>

        <div class="mb-3">
          <label for="official_id" class="form-label">Responsible Official</label>
          <select name="official_id" id="official_id" class="form-select">
            <option value="">-- None --</option>
            @foreach ($officials as $official)
              <option value="{{ $official->id }}" {{ $service->official_id == $official->id ? 'selected' : '' }}>
                {{ $official->first_name }} {{ $official->last_name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="office_hours" class="form-label">Office Hours</label>
          <input type="text" name="office_hours" id="office_hours" class="form-control" value="{{ $service->office_hours }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Service</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

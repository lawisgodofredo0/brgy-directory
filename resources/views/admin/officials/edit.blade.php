<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Official – Barangay Balintawak Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="card shadow p-4">
      <h2 class="mb-4">Edit Official</h2>

      <a href="/admin/officials" class="btn btn-secondary mb-3">Back to List</a>

      <!-- Display errors here if any -->
      <div class="alert alert-danger" style="display: none;" id="errorBlock">
        <ul id="errorList"></ul>
      </div>

      <form action="/admin/officials/{id}" method="POST" enctype="multipart/form-data">
        <!-- CSRF token and PUT method hidden inputs for Laravel -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">

        <div class="mb-3">
          <label for="first_name" class="form-label">First Name*</label>
          <input type="text" name="first_name" id="first_name"
                 class="form-control" value="{{ old('first_name', $official->first_name) }}" required>
        </div>

        <div class="mb-3">
          <label for="last_name" class="form-label">Last Name*</label>
          <input type="text" name="last_name" id="last_name"
                 class="form-control" value="{{ old('last_name', $official->last_name) }}" required>
        </div>

        <div class="mb-3">
          <label for="position" class="form-label">Position*</label>
          <input type="text" name="position" id="position"
                 class="form-control" value="{{ old('position', $official->position) }}" required>
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" name="phone" id="phone"
                 class="form-control" value="{{ old('phone', $official->phone) }}">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" id="email"
                 class="form-control" value="{{ old('email', $official->email) }}">
        </div>

        <div class="mb-3">
          <label for="responsibilities" class="form-label">Responsibilities</label>
          <textarea name="responsibilities" id="responsibilities"
                    class="form-control">{{ old('responsibilities', $official->responsibilities) }}</textarea>
        </div>

        <div class="mb-3">
          <label for="photo" class="form-label">Photo (optional)</label>
          <input type="file" name="photo" id="photo" class="form-control">
          <!-- If photo exists -->
          <div class="mt-2">
            <img src="{{ asset('storage/' . $official->photo) }}"
                 alt="Current Photo" width="100" class="img-thumbnail">
          </div>
        </div>

        <button type="submit" class="btn btn-success">Update Official</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

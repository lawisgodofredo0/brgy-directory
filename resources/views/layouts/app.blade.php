{{-- resources/views/layouts/public.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Barangay Balintawak')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      background: #f8fafc;
      overflow-x: hidden;
    }
    .sidebar {
      width: 220px;
      background: #1e293b;
      color: #fff;
      flex-shrink: 0;
      padding-top: 1rem;
    }
    .sidebar a {
      color: #cbd5e1;
      display: block;
      padding: .75rem 1.25rem;
      text-decoration: none;
      border-radius: .375rem;
      transition: background 0.2s, color 0.2s;
    }
    .sidebar a:hover, .sidebar a.active {
      background: #334155;
      color: #fff;
    }
    .content {
      flex-grow: 1;
      padding: 2rem;
    }
    .header-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #ffffff;
      border-radius: .5rem;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      padding: 1rem 1.5rem;
      margin-bottom: 1.5rem;
    }
    .header-bar h5 {
      margin: 0;
      color: #0d6efd;
      font-weight: 600;
    }
    .btn-success {
      background-color: #198754;
      border: none;
    }
    .btn-success:hover {
      background-color: #157347;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-header px-3 mb-4">
      <h5 class="text-white">Barangay Balintawak</h5>
    </div>
    <nav class="nav flex-column">
      <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
      <a href="{{ route('officials.index') }}" class="nav-link {{ request()->routeIs('officials.index') ? 'active' : '' }}">Officials</a>
      <a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.index') ? 'active' : '' }}">Services</a>
      <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
    </nav>
  </aside>

  <!-- Main content area -->
  <div class="content">
    <div class="header-bar">
      <h5>Barangay Balintawak</h5>
      <a href="{{ route('admin.login') }}" class="btn btn-success shadow-sm px-3">Admin Login</a>
    </div>

    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

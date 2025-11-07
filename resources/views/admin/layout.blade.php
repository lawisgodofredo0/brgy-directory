{{-- resources/views/admin/layout.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Dashboard – Barangay Balintawak')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      overflow: hidden;
      background: #f8fafc;
    }
    .sidebar {
      width: 250px;
      background: #1e293b;
      color: #fff;
      flex-shrink: 0;
      display: flex;
      flex-direction: column;
    }
    .sidebar-header {
      padding: 1.5rem;
      text-align: center;
      font-size: 1.2rem;
      font-weight: bold;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .nav-link {
      color: #cbd5e1;
      padding: 12px 18px;
      text-decoration: none;
    }
    .nav-link:hover, .nav-link.active {
      background: #334155;
      color: #fff;
    }
    .nav-link.text-danger:hover {
      background: #b91c1c;
      color: #fff;
    }
    .content {
      flex-grow: 1;
      overflow-y: auto;
    }
    .top-navbar {
      background: #ffffff;
      border-bottom: 1px solid #e2e8f0;
      padding: 0.75rem 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .top-navbar .brand {
      font-weight: bold;
      color: #1e293b;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <aside class="sidebar">
    <div>
      <div class="sidebar-header">Admin Panel</div>
      <nav class="nav flex-column mt-3">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          Dashboard
        </a>
        <a href="{{ route('admin.officials.index') }}" class="nav-link {{ request()->routeIs('admin.officials.*') ? 'active' : '' }}">
          Officials
        </a>
        <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
          Services
        </a>
        <a href="{{ route('admin.register') }}" class="nav-link {{ request()->routeIs('admin.register') ? 'active' : '' }}">
          Register Admin
        </a>
      </nav>
    </div>
    <div class="mt-auto p-3">
      <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="btn btn-link nav-link text-white">Logout</button>
      </form>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="flex-grow-1 d-flex flex-column">
    <!-- Top Navbar -->
    <nav class="top-navbar">
      <a href="{{ route('admin.dashboard') }}" class="brand">Barangay Balintawak Admin</a>
      <div>
        <span class="text-secondary me-3">Hello, Admin</span>
        <a href="{{ route('admin.logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="btn btn-outline-danger btn-sm">Logout</a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </nav>

    <!-- Dynamic Page Content -->
    <main class="content p-4">
      @yield('content')
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

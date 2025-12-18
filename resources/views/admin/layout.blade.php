<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Admin' }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', sans-serif; }

        body {
            background: linear-gradient(135deg, #CDE8E5 0%, #EEF7FF 100%);
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #4D869C 0%, #4D869C 100%);
            height: 100vh;
            position: fixed;
            padding-top: 30px;
            box-shadow: 4px 0 20px rgba(77,134,156,.15);
        }

        .sidebar-brand {
            padding: 0 25px 30px;
            border-bottom: 1px solid rgba(255,255,255,.2);
            margin-bottom: 20px;
        }

        .sidebar-brand h4 {
            color: #fff;
            font-weight: 700;
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .icon-box {
            width: 45px;
            height: 45px;
            background: rgba(255,255,255,.25);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 14px 18px;
            margin: 0 15px 8px;
            color: rgba(255,255,255,.85);
            text-decoration: none;
            border-radius: 12px;
            transition: .3s;
            font-weight: 500;
        }

        .sidebar-menu a i { font-size: 20px; }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,.15);
            color: #fff;
            transform: translateX(5px);
        }

        .sidebar-menu a.active {
            background: #fff;
            color: #4D869C;
            box-shadow: 0 4px 12px rgba(0,0,0,.1);
        }

        .content {
            margin-left: 280px;
            padding: 30px 40px;
        }

        .navbar-custom {
            background: #fff;
            padding: 18px 40px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(77,134,156,.1);
            margin-bottom: 35px;
        }

        .user-info {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            border: 3px solid #CDE8E5;
        }

        .user-name {
            font-weight: 600;
            color: #4D869C;
        }

        .user-role {
            font-size: 12px;
            color: #7AB2B2;
        }

        .btn-logout {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: #fff;
            padding: 10px 24px;
            border-radius: 10px;
            font-weight: 600;
            border: none;
        }

        .btn-logout:hover {
            color: #fff;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="sidebar-brand">
        <h4>
            <div class="icon-box">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <span>Admin BK</span>
        </h4>
    </div>

    <div class="sidebar-menu">
        <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>

        <a href="/admin/konseling" class="{{ request()->is('admin/konseling*') ? 'active' : '' }}">
            <i class="bi bi-chat-dots-fill"></i>
            Data Konseling
        </a>

        <a href="/admin/siswa" class="{{ request()->is('admin/siswa*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i>
            Data Siswa
        </a>

        <a href="/admin/guru" class="{{ request()->is('admin/guru*') ? 'active' : '' }}">
            <i class="bi bi-person-badge-fill"></i>
            Data Guru
        </a>
    </div>
</div>

<!-- CONTENT -->
<div class="content">

    <!-- NAVBAR -->
    <div class="navbar-custom d-flex justify-content-between align-items-center">
        <div class="user-info">
            <img class="avatar"
                 src="https://ui-avatars.com/api/?name=Admin&background=4D869C&color=fff">
            <div>
                <div class="user-name">{{ auth()->user()->username }}</div>
                <div class="user-role">Administrator</div>
            </div>
        </div>

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();"
           class="btn-logout">
            <i class="bi bi-box-arrow-right me-2"></i>Logout
        </a>
    </div>

    @yield('content')
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

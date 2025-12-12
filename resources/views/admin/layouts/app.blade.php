<!doctype html>
<html lang="id">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin - @yield('title')</title>

<link rel="stylesheet" href="/css/admin.css">

</head>
<body>

<div class="admin-wrapper">

    <!-- SIDEBAR -->
    <aside class="admin-sidebar">
        <h2>Adminn</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.campaigns.index') }}">Campaigns</a></li>
            <li><a href="{{ route('admin.donations.index') }}">Donations</a></li>
        </ul>
    </aside>

    <!-- CONTENT -->
    <main class="admin-content">
        @if(session('success'))
            <div class="list-item" style="background:#d7ffd7;color:#116611;">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</div>

</body>
</html>

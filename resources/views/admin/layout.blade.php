<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f7fb
        }

        .sidebar {
            min-height: 100vh;
            background: #07111f
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 12px 18px
        }

        .sidebar a:hover {
            background: #123
        }

        .card {
            border: 0;
            box-shadow: 0 6px 20px #0000000d
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-2 sidebar p-0">
                <div class="p-3 text-white fw-bold">ISP ADMIN</div><a href="{{ route('admin.dashboard') }}">Dashboard</a><a href="{{ route('admin.packages.index') }}">Packages</a><a href="{{ route('admin.orders.index') }}">Orders</a><a href="{{ route('admin.customers.index') }}">Customers</a><a href="{{ route('admin.testimonials.index') }}">Testimonials</a><a href="{{ route('admin.abouts.index') }}">abouts</a><a href="{{ route('admin.settings.edit') }}">Settings</a>
                <form method="POST" action="{{ route('admin.logout') }}" class="p-3">@csrf<button class="btn btn-outline-light w-100">Logout</button></form>
            </aside>
            <main class="col-md-10 p-4">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif @yield('content')
            </main>
        </div>
    </div>
</body>

</html>

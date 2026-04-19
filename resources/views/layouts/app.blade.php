<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f4f7fb 0%, #e7eef8 100%);
        }

        .navbar-brand {
            letter-spacing: 0.04em;
        }

        .page-card {
            border: 0;
            border-radius: 1rem;
            box-shadow: 0 1rem 3rem rgba(15, 23, 42, 0.08);
        }

        .table thead th {
            white-space: nowrap;
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('students.index') }}">Student Management System</a>
        </div>
    </nav>

    <main class="py-5">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>

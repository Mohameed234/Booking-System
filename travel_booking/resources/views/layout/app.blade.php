<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow px-6 py-4">
        Dashboard Navbar
    </nav>

    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>

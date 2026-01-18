<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Travel Booking')</title>

        {{-- Tailwind --}}
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    
    <body class="bg-gray-50 min-h-screen">

        {{-- Page Content --}}
        @yield('content')

    </body>
</html>

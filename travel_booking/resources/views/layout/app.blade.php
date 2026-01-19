<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="bg-gray-100">


<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
              <a href="/dashboard" aria-current="page" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Dashboard</a>
              <a href="/bookings" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Bookings</a>
              <a href="/flights" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Flights</a>

            </div>
          </div>
        </div>

        @if(auth()->check())

        <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">

                <a href="#" class="px-4 text-white">{{auth()->user()->name}}</a>
                <form method="POST" action="/logout">
                    @csrf

                    <button type="submit" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white hover:bg-red-700 hover:cursor-pointer">Logout</button>
                </form>
            </div>
        </div>
        @else
        <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
                <a href="/signin" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white hover:bg-gray-700 hover:cursor-pointer">Login</a>
                <a href="/signup" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white hover:bg-gray-700 hover:cursor-pointer">Register</a>

            </div>
        </div>
        @endif

    </div>


  </nav>

  <header class="relative bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">@yield('Header')</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
    </div>
  </main>
</div>


    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>

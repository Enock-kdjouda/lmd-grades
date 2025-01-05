<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LMD Grades')</title>
    @vite('resources/css/app.css') {{-- Tailwind CSS --}}
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-lg font-bold">LMD Grades Management</h1>
    </header>

    <main class="container mx-auto mt-6">
        @yield('content') {{-- Contenu spécifique à chaque vue --}}
    </main>

    <footer class="bg-gray-800 text-white text-center p-4 mt-6">
        &copy; {{ date('Y') }} - LMD Grades
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    @vite('resources/css/app.css') <!-- Include Vite to load Tailwind -->
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="text-center">
    <h1 class="text-4xl font-bold mb-8 text-indigo-600">Welcome to the Site</h1>

    @if (Auth::check())
        <!-- If the user is authenticated -->
        <div class="text-xl font-semibold mb-4">
            Welcome, {{ Auth::user()->name }}!
        </div>

        <!-- Logout Form -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="inline-flex items-center justify-center w-full px-4 py-2 rounded-md border border-gray-300 bg-red-600 text-white text-sm font-medium hover:bg-red-700">
                Logout
            </button>
        </form>
    @else
        <!-- If the user is not authenticated -->
        <div class="relative inline-block text-left">
            <button onclick="toggleDropdown()" type="button"
                    class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-indigo-600 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none">
                Menu
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div id="dropdownMenu" class="origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                    <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Login</a>
                    <a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Register</a>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    function toggleDropdown() {
        var menu = document.getElementById('dropdownMenu');
        menu.classList.toggle('hidden');
    }

    // Optional: Close dropdown if clicked outside
    window.addEventListener('click', function(e) {
        const button = document.querySelector('button');
        const menu = document.getElementById('dropdownMenu');

        if (!button.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
       
    @endif
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="flex items-center justify-center min-h-screen bg-gray-50 dark:bg-black">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md w-full max-w-sm">
            @auth
                <h2 class="text-2xl font-bold text-center mb-6">Already login</h2>
                <div class="mb-4 text-center">
                    <a href="{{ url('/home') }}" class="w-full bg-[#FF2D20] text-white py-2 rounded-md hover:bg-[#e63946] transition">Go to Home</a>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-md hover:bg-red-500 transition">Logout</button>
                </form>
            @else
                <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="email" required class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#FF2D20] dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Enter your email">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 dark:text-gray-300">Password</label>
                        <input type="password" name="password" id="password" required class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#FF2D20] dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Enter your password">
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <input type="checkbox" name="remember" id="remember" class="mr-2">
                            <label for="remember" class="text-gray-700 dark:text-gray-300">Remember Me</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-[#FF2D20] hover:underline dark:text-white">Forgot Password?</a>
                    </div>
                    <button type="submit" class="w-full bg-[#FF2D20] text-white py-2 rounded-md hover:bg-[#e63946] transition">Login</button>
                </form>
                <div class="mt-4 text-center">
                    <span class="text-gray-700 dark:text-gray-300">Don't have an account? </span>
                    <a href="{{ route('register') }}" class="text-[#FF2D20] hover:underline dark:text-white">Register</a>
                </div>
            @endauth
        </div>
    </div>
</body>
</html>

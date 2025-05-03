<!-- filepath: c:\laragon\www\sistem-perpustakaan\resources\views\auth\login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-semibold mb-6">Login</h1>
        <form action="{{ route('login') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md">Login</button>
        </form>
        <p class="mt-4">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500">Register</a></p>
    </div>
</body>
</html>
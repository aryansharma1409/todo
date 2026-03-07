<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blog Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-pink-200 via-pink-300 to-pink-400 h-screen flex items-center justify-center">

<div class="bg-white shadow-2xl rounded-2xl p-10 w-96">

    <h2 class="text-3xl font-bold text-center text-pink-500 mb-6">
        Login
    </h2>
<form action="/login" method="POST" class="space-y-4">
@csrf

<!-- Email -->
@if(session('error'))
<div class="bg-pink-300 text-black-700 p-2 rounded mb-3 text-center">
    {{ session('error') }}
</div>
@endif
<div>
<label class="block text-gray-700 font-semibold">Email</label>
<input type="email"
       name="email"
       placeholder="Enter your email"
       class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
</div>

<!-- Password -->
<div>
<label class="block text-gray-700 font-semibold">Password</label>
<input type="password"
       name="password"
       placeholder="Enter your password"
       class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
</div>
        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label class="flex items-center space-x-2">
                <input type="checkbox" class="accent-pink-500">
                <span class="text-sm text-gray-600">Remember me</span>
            </label>

            <a href="#" class="text-sm text-pink-500 hover:underline">
                Forgot password?
            </a>
        </div>

        <!-- Login Button -->
        <button type="submit"
                class="w-full bg-pink-500 text-white py-2 rounded-lg hover:bg-pink-600 transition">
            Login
        </button>

        <!-- Register -->
        <p class="text-center text-sm text-gray-600">
            Don't have an account?
            <a href="/register" class="text-pink-500 font-semibold hover:underline">
                Register
            </a>
        </p>

    </form>

</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blog Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-pink-200 via-pink-300 to-pink-400 h-screen flex items-center justify-center">

<div class="bg-white shadow-2xl rounded-2xl p-10 w-96">

    <h2 class="text-3xl font-bold text-center text-pink-500 mb-6">
        Register
    </h2>

    <form action="/register" method="POST" class="space-y-4">
        @csrf
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <!-- Name -->
        <div>
            <label class="block text-gray-700 font-semibold">Name</label>
            <input type="text"
                   name="name"
                   placeholder="Enter your name"
                   class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
        </div>

        <!-- Email -->
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

        <!-- Register Button -->
        <button type="submit"
                class="w-full bg-pink-500 text-white py-2 rounded-lg hover:bg-pink-600 transition">
            Register
        </button>

        <!-- Login -->
        <p class="text-center text-sm text-gray-600">
            Already have an account?
            <a href="/login" class="text-pink-500 font-semibold hover:underline">
                Login
            </a>
        </p>

    </form>

</div>

</body>
</html>

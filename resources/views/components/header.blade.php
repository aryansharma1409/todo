<nav class="bg-pink-500 shadow-md">
    <div class="max-w-6xl mx-auto flex justify-between items-center px-6 py-3">

        <!-- Logo + App Name -->
        <a href="/dashboard" class="flex items-center space-x-3 p-2 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
    <img src="{{ asset('images/logo.png') }}"
         alt="ToDo Logo"
         class="h-12 w-auto object-contain rounded-md">
</a>

        <!-- Logout Button -->
        <a href="/logout"
           class="bg-white text-pink-500 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition">
           @csrf
           Logout
        </a>

    </div>
</nav>

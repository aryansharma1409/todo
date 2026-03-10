<nav class="bg-pink-500 shadow-md">
    <div class="max-w-6xl mx-auto flex justify-between items-center p-4">

        <!-- Left Side (Logo) -->
        <a href="/dashboard" class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}"
                 alt="Logo"
                 class="h-10 w-auto object-contain rounded-xl">
        </a>

        <!-- Right Side (Buttons) -->
        <div class="flex items-center gap-3">

        <button
            onclick="openModal('editProfileModal')"
            class="bg-white text-pink-600 px-4 py-1 rounded-lg font-semibold hover:bg-gray-100">
            Edit Profile
        </button>
             @guest
        <a href="/register"
               class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 text-sm">
               Register
        </a>
        @endguest
            <a href="/logout"
               class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 text-sm">
               Logout
            </a>
        </div>

    </div>
</nav>

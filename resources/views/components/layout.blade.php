<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ToDo Application</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-pink-200 via-pink-300 to-pink-400 min-h-screen flex flex-col">

<x-header />

<main class="flex-grow">
    {{ $slot }}
</main>

<x-footer />

<!-- EDIT PROFILE MODAL -->

<div id="editProfileModal"
class="fixed inset-0 bg-black bg-opacity-40 hidden flex items-center justify-center">
<div class="bg-white p-6 rounded-xl w-96">

<h2 class="text-xl font-bold mb-4">Edit Profile</h2>
<form method="POST" action="/profile/update">
@csrf
@method('PUT')
<input
type="text"
name="name"
value="{{ auth()->user()->name }}"
class="border p-2 w-full rounded mb-4">

<input
type="email"
name="email"
value="{{ auth()->user()->email }}"
class="border p-2 w-full rounded mb-4">

<input
type="password"
name="password"
class="border p-2 w-full rounded mb-4">

<div class="flex justify-end gap-2">
<button
type="button"
onclick="closeModal('editProfileModal')"
class="px-4 py-2 bg-gray-300 rounded-lg">
Cancel
</button>

<button
class="px-4 py-2 bg-blue-600 text-white rounded-lg">
Update
</button>

</div>

</form>

</div>
</div>
</body>
</html>

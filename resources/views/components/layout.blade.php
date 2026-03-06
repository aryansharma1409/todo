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

</body>
</html>

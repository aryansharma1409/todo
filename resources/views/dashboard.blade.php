<x-layout>

@php
$hour = \Carbon\Carbon::now('Asia/Kolkata')->hour;

if ($hour < 12) {
    $greeting = "Good Morning";
} elseif ($hour < 17) {
    $greeting = "Good Afternoon";
} else {
    $greeting = "Good Evening";
}
@endphp

<div class="max-w-6xl mx-auto mt-6 px-4">
    <div class="bg-white shadow rounded-lg p-5">
        <h2 class="text-2xl font-bold text-center text-gray-800">
          <u>{{ $greeting }}</u>, {{ auth()->user()->name }} 👋
        </h2>
        <p class="text-gray-500 text-center text-sm mt-1">
            Welcome to your dashboard. Manage your tasks easily today.
        </p>
    </div>
</div>
<div class="max-w-4xl mx-auto mt-10 space-y-6">

<!-- HEADER -->
<div class="flex justify-between items-center">
<h1 class="text-2xl font-bold"><u>My Tasks</u></h1>

<button
onclick="openModal('createModal')"
class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
+ New Task
</button>
</div>


<!-- STATS -->

<div class="grid grid-cols-2 gap-4">

<div class="bg-white shadow rounded-xl p-6">
<h2 class="text-gray-500 text-sm">Pending Tasks</h2>
<p class="text-3xl font-bold">{{ $activeCount }}</p>
</div>

<div class="bg-white shadow rounded-xl p-6">
<h2 class="text-gray-500 text-sm">Completed Tasks</h2>
<p class="text-3xl font-bold">{{ $completedCount }}</p>
</div>

</div>


<!-- TASK LIST -->

<div class="bg-white shadow rounded-xl p-4">
<h2 class="text-xl text-center font-semibold mb-4"><u>All Tasks</u></h2>

  <div class="grid grid-cols-4 font-semibold border-b pb-2">
        <div class='pl-10'>Tasks</div>
        <div>Description</div>
        <div>Due Date</div>
        <div class="text-right">Action</div>
    </div>
@foreach($tasks as $task)

<div class="grid grid-cols-4 items-center border-b py-3">

<!-- TASK COLUMN -->
<div class="flex items-center gap-3">

<form method="POST" action="/tasks/{{ $task->id }}/toggle">
@csrf
<button
class="w-5 h-5 border-2 rounded-full flex items-center justify-center transition
{{ $task->completed ? 'bg-green-500 border-green-500' : '' }}">
</button>
</form>

<span class="font-medium {{ $task->completed ? 'line-through text-gray-400' : '' }}">
<p>{{ ucfirst($task->title) }}</p></span>

</div>


<!-- DESCRIPTION COLUMN -->
<div class="text-gray-500 {{ $task->completed ? 'line-through text-gray-400' : '' }}">
{{ $task->description }}
</div>

<div class="text-gray-500 {{ $task->completed ? 'line-through text-gray-400' : '' }}">
{{ \Carbon\Carbon::parse($task->due_date)->format('F d, Y') }}
</div>

<!-- ACTION COLUMN -->
<div class="flex justify-end gap-3">

<button
onclick="openModal('editModal{{ $task->id }}')"
class="flex items-center text-blue-600 hover:text-blue-800">

    <img src="{{ asset('images/edit.png') }}"
         class="w-8 h-8 mr-1"
         alt="Edit">

</button>

<span>|</span>
<form method="POST" action="/tasks/{{ $task->id }}">
    @csrf
    @method('DELETE')

    <button class="text-red-600 hover:text-red-800 flex items-center">
        <img src="{{ asset('images/delete.png') }}"
             class="w-7 h-7"
             alt="Delete">
    </button>
</form>

</div>

</div>

<!-- EDIT MODAL -->

<div
id="editModal{{ $task->id }}"
class="fixed inset-0 bg-black bg-opacity-40 hidden flex items-center justify-center">

<div class="bg-white p-6 rounded-xl w-96">

<h2 class="text-xl font-bold mb-4">Edit Task</h2>
@if ($errors->any())
<div class="bg-red-500 text-white p-2 rounded mb-3 text-center">
    {{ $errors->first() }}
</div>
@endif
<form method="POST" action="/tasks/{{ $task->id }}">
@csrf
@method('PUT')

<input
type="text"
name="title"
value="{{ $task->title }}"
class="border p-2 w-full rounded mb-4"
required
>
<input
type="text"
name="description"
value="{{ $task->description }}"
class="border p-2 w-full rounded mb-4"
>
<input
type="date"
name="due_date"
value="{{ $task->due_date }}"
class="border p-2 w-full rounded mb-4"
required
>

<div class="flex justify-end gap-2">

<button
type="button"
onclick="closeModal('editModal{{ $task->id }}')"
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


@endforeach

</div>

</div>



<!-- CREATE MODAL -->

<div
id="createModal"
class="fixed inset-0 bg-black bg-opacity-40 hidden flex items-center justify-center">

<div class="bg-white p-6 rounded-xl w-96">

<h2 class="text-xl font-bold mb-4">Create Task</h2>

<form method="POST" action="/tasks">
@csrf

<input
type="text"
name="title"
placeholder="Enter task..."
class="border p-2 w-full rounded mb-4"
required
>
<input
type="text"
name="description"
placeholder="Enter Description..."
class="border p-2 w-full rounded mb-4"
>
<input
type="date"
name="due_date"
placeholder="Enter Due Date..."
class="border p-2 w-full rounded mb-4"
required
>

<div class="flex justify-end gap-2">

<button
type="button"
onclick="closeModal('createModal')"
class="px-4 py-2 bg-gray-300 rounded-lg">
Cancel
</button>

<button
class="px-4 py-2 bg-blue-600 text-white rounded-lg">
Save
</button>

</div>

</form>

</div>

</div>
<!-- MODAL SCRIPT -->

<script>

function openModal(id){
document.getElementById(id).classList.remove('hidden');
}

function closeModal(id){
document.getElementById(id).classList.add('hidden');
}

</script>
@if(session('success'))
<div id="toast"
class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform transition-all duration-500 translate-y-10 opacity-0">
    {{ session('success') }}
</div>
@endif
<script>
const toast = document.getElementById('toast');
setTimeout(()=> {
    toast.classList.remove('translate-y-10','opacity-0');
},100);

setTimeout(()=> {
    toast.classList.add('opacity-0');
},3000);
</script>
<br>
<br>
</x-layout>

<x-layout>

<div class="max-w-4xl mx-auto mt-10 space-y-6">

<!-- HEADER -->

<div class="flex justify-between items-center">
<h1 class="text-2xl font-bold">My Tasks</h1>

<button
onclick="openModal('createModal')"
class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
+ New Task
</button>
</div>


<!-- STATS -->

<div class="grid grid-cols-2 gap-4">

<div class="bg-white shadow rounded-xl p-6">
<h2 class="text-gray-500 text-sm">Active Tasks</h2>
<p class="text-3xl font-bold">{{ $activeCount }}</p>
</div>

<div class="bg-white shadow rounded-xl p-6">
<h2 class="text-gray-500 text-sm">Completed Tasks</h2>
<p class="text-3xl font-bold">{{ $completedCount }}</p>
</div>

</div>


<!-- TASK LIST -->

<div class="bg-white shadow rounded-xl p-4">
<h2 class="text-lg font-semibold mb-4">All Tasks</h2>

  <div class="grid grid-cols-3 font-semibold border-b pb-2">
        <div class='pl-10'>Tasks</div>
        <div>Description</div>
        <div class="text-right">Action</div>
    </div>
@foreach($tasks as $task)

<div class="grid grid-cols-3 items-center border-b py-3">

<!-- TASK COLUMN -->
<div class="flex items-center gap-3">

<form method="POST" action="/tasks/{{ $task->id }}/toggle">
@csrf
<button
class="w-5 h-5 border-2 rounded-full flex items-center justify-center transistion
{{ $task->completed ? 'bg-green-500 border-green-500' : '' }}">
</button>
</form>

<span class="font-medium {{ $task->completed ? 'line-through text-gray-400' : '' }}">
{{ $task->title }}
</span>

</div>


<!-- DESCRIPTION COLUMN -->
<div class="text-gray-500 {{ $task->completed ? 'line-through text-gray-400' : '' }}">
{{ $task->description }}
</div>


<!-- ACTION COLUMN -->
<div class="flex justify-end gap-3">

<button
onclick="openModal('editModal{{ $task->id }}')"
class="text-blue-600 hover:underline text-md">
Edit
</button>

<span>|</span>
<form method="POST" action="/tasks/{{ $task->id }}">
@csrf
@method('DELETE')

<button class="text-red-600 hover:underline text-md">
Delete
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

</x-layout>

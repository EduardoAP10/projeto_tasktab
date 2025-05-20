<x-layouts.app :title="__('Dashboard')">
<div class="max-w-2xl mx-auto py-10">
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('tasks.store') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block font-semibold">Título</label>
            <input name="title" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Descrição</label>
            <textarea name="description" class="w-full border p-2 rounded"></textarea>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">
            Salvar Tarefa
        </button>
    </form>

    <hr class="my-6">

    <h2 class="text-xl font-bold mb-2">Tarefas Cadastradas</h2>
    <ul class="space-y-2">
        @foreach ($tasks as $task)
            <li class="p-3 border rounded">
                <strong>{{ $task->title }}</strong><br>
                <small>{{ $task->description }}</small>
            </li>
        @endforeach
    </ul>
</div>

</x-layouts.app>

<div class="p-6 bg-gray-900 min-h-screen text-white">
    <h1 class="text-3xl font-bold mb-6">🎮 Minhas Tarefas</h1>

    <ul class="space-y-4">
        @foreach($tasks as $task)
            <li class="bg-gray-800 p-4 rounded shadow flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold">{{ $task->title }}</h2>
                    <p class="text-sm text-gray-400">{{ $task->description }}</p>
                </div>
                <div class="text-right">
                    <span class="text-green-400 font-bold">{{ $task->points }} XP</span><br>
                    @if($task->completed)
                        <span class="text-sm text-green-300">✅ Concluída</span>
                    @else
                        <span class="text-sm text-red-400">❌ Pendente</span>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>

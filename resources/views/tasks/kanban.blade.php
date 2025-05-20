@extends('components.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold text-indigo-400 mb-6">📋 Painel de Tarefas</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach (['Pendente', 'Em Andamento', 'Concluída'] as $status)
        <div class="bg-zinc-900 rounded-lg p-4 border border-zinc-700">
            <h2 class="text-xl font-semibold text-white mb-4">{{ $status }}</h2>

            <div class="flex flex-col gap-4 min-h-[200px]" id="column-{{ Str::slug($status) }}" data-status="{{ $status }}">
                @foreach ($tarefas[$status] ?? [] as $tarefa)
                <div class="bg-zinc-800 rounded-xl shadow-md hover:shadow-xl p-4 border-l-4 cursor-grab transition-all duration-200"
                    data-id="{{ $tarefa->id }}"
                    @class([ 'border-yellow-500'=> $status === 'Pendente',
                    'border-blue-500' => $status === 'Em Andamento',
                    'border-green-500' => $status === 'Concluída',
                    ])>

                    <div class="text-white font-semibold text-base leading-tight">{{ $tarefa->title }}</div>
                    <p class="text-sm text-zinc-400 mb-2">{{ $tarefa->description }}</p>

                    <div class="flex items-center gap-2 text-xs text-white">
                        <span class="bg-purple-700 px-2 py-0.5 rounded font-semibold">UMENTOR - INTEGRAÇÃO</span>
                        <span class="bg-green-500 text-black px-2 py-0.5 rounded font-bold">ID RA-{{ $tarefa->id }}</span>
                    </div>

                    <div class="flex items-center justify-between mt-2 text-xs text-zinc-300">
                        <span class="bg-zinc-700 px-2 py-0.5 rounded">XP: {{ $tarefa->xp }}</span>
                        <span class="bg-zinc-700 px-2 py-0.5 rounded">🎮 {{ $tarefa->difficulty }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.querySelectorAll('[id^="column-"]').forEach(column => {
        new Sortable(column, {
            group: 'kanban',
            animation: 150,
            fallbackOnBody: true,
            swapThreshold: 0.65,
            onAdd: function(evt) {
                const taskId = evt.item.dataset.id;
                const newStatus = evt.to.dataset.status;

                fetch(`/tarefas/${taskId}/atualizar-status`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            status: newStatus
                        })
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Erro ao atualizar status');
                        console.log('Status atualizado com sucesso!');
                    })
                    .catch(error => {
                        alert('Erro ao atualizar status: ' + error.message);
                    });
            }
        });
    });
</script>
@endpush
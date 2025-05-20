@extends('components.layouts.app')

@section('content')

<style>
    select,
    option {
        background-color: #1e1e24;
        color: white;
    }
</style>

<div class="flex justify-center items-center p-8">
    <div class="w-full max-w-3xl bg-zinc-800 text-white rounded-2xl shadow-2xl p-10 border border-zinc-700">

        <h1 class="text-3xl font-extrabold text-indigo-400 mb-8 text-center">🎯 Criar Nova Tarefa</h1>

        <form method="POST" action="{{ route('tasks.store') }}" class="space-y-6">
            @csrf

            @php
            $inputClass = "mt-2 w-full bg-zinc-900 text-white border border-zinc-700 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500";
            @endphp

            <div>
                <label for="title" class="text-sm font-bold uppercase tracking-wide">📝 Título da Tarefa</label>
                <input type="text" name="title" id="title" class="{{ $inputClass }}" required>
            </div>

            <div>
                <label for="description" class="text-sm font-bold uppercase tracking-wide">📜 Descrição</label>
                <textarea name="description" id="description" rows="3" class="{{ $inputClass }}"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="difficulty" class="text-sm font-bold uppercase tracking-wide">🎮 Dificuldade</label>
                    <select name="difficulty" id="difficulty" class="{{ $inputClass }}">
                        <option value="Fácil">Fácil</option>
                        <option value="Médio">Médio</option>
                        <option value="Difícil">Difícil</option>
                    </select>
                </div>

                <div>
                    <label for="xp" class="text-sm font-bold uppercase tracking-wide">💥 XP</label>
                    <input type="number" name="xp" id="xp" class="{{ $inputClass }}" placeholder="ex: 50">
                </div>

                <div>
                    <label for="reward" class="text-sm font-bold uppercase tracking-wide">🎁 Recompensa</label>
                    <input type="text" name="reward" id="reward" class="{{ $inputClass }}" placeholder="ex: Moeda, item, bônus...">
                </div>

                <div>
                    <label for="due_date" class="text-sm font-bold uppercase tracking-wide">📅 Prazo Final</label>
                    <input type="date" name="due_date" id="due_date" class="{{ $inputClass }}">
                </div>
            </div>

            <div>
                <label for="status" class="text-sm font-bold uppercase tracking-wide">🚦 Status</label>
                <select name="status" id="status" class="{{ $inputClass }}">
                    <option value="Pendente">Pendente</option>
                    <option value="Em Andamento">Em Andamento</option>
                    <option value="Concluída">Concluída</option>
                </select>
            </div>

            <div class="text-right pt-6">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-xl font-bold shadow-lg transition-all">
                    Salvar Missão
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
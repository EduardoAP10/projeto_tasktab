<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskList extends Component
{
    public function render()
    {
        return view('livewire.task-list', [
            'tasks' => Task::all()
        ]);
    }
}

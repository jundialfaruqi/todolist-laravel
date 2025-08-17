<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TaskCreate extends Component
{
    public $title = '';
    public $description = '';
    public $due_date = '';
    public $priority = 'medium';

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date|after_or_equal:today',
        'priority' => 'required|in:low,medium,high',
    ];

    protected $messages = [
        'title.required' => 'Judul tugas wajib diisi.',
        'title.max' => 'Judul tugas maksimal 255 karakter.',
        'due_date.after_or_equal' => 'Tenggat waktu tidak boleh di masa lalu.',
        'priority.required' => 'Prioritas wajib dipilih.',
        'priority.in' => 'Prioritas tidak valid.',
    ];

    public function save()
    {
        $this->validate();

        Task::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => $this->due_date ?: null,
            'priority' => $this->priority,
            'is_completed' => false,
        ]);

        session()->flash('message', 'Tugas berhasil dibuat!');

        return $this->redirect(route('tasks.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.tasks.task-create')->layout('layouts.app');
    }
}

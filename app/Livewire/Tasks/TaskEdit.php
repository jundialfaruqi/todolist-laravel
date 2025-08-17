<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TaskEdit extends Component
{
    public Task $task;
    public $title = '';
    public $description = '';
    public $due_date = '';
    public $priority = 'medium';
    public $is_completed = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
        'priority' => 'required|in:low,medium,high',
        'is_completed' => 'boolean',
    ];

    protected $messages = [
        'title.required' => 'Judul tugas wajib diisi.',
        'title.max' => 'Judul tugas maksimal 255 karakter.',
        'priority.required' => 'Prioritas wajib dipilih.',
        'priority.in' => 'Prioritas tidak valid.',
    ];

    public function mount(Task $task)
    {
        // Ensure the task belongs to the authenticated user
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $this->task = $task;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->due_date = $task->due_date ? $task->due_date->format('Y-m-d') : '';
        $this->priority = $task->priority;
        $this->is_completed = $task->is_completed;
    }

    public function save()
    {
        $this->validate();

        $this->task->update([
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => $this->due_date ?: null,
            'priority' => $this->priority,
            'is_completed' => $this->is_completed,
        ]);

        session()->flash('message', 'Tugas berhasil diperbarui!');

        return $this->redirect(route('tasks.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.tasks.task-edit')->layout('layouts.app');
    }
}

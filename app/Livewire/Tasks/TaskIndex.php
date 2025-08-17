<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class TaskIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $filterStatus = 'all';
    public $filterPriority = 'all';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = [
        'search' => ['except' => ''],
        'filterStatus' => ['except' => 'all'],
        'filterPriority' => ['except' => 'all'],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    public function updatingFilterPriority()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function toggleComplete($taskId)
    {
        $task = Task::where('id', $taskId)
            ->where('user_id', Auth::id())
            ->first();

        if ($task) {
            $task->update(['is_completed' => !$task->is_completed]);

            session()->flash('message', $task->is_completed ? 'Tugas berhasil diselesaikan!' : 'Tugas dikembalikan ke pending!');
        }
    }

    public function deleteTask($taskId)
    {
        $task = Task::where('id', $taskId)
            ->where('user_id', Auth::id())
            ->first();

        if ($task) {
            $task->delete();
            session()->flash('message', 'Tugas berhasil dihapus!');
        }
    }

    public function render()
    {
        $tasks = Task::where('user_id', Auth::id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filterStatus !== 'all', function ($query) {
                if ($this->filterStatus === 'completed') {
                    $query->where('is_completed', true);
                } elseif ($this->filterStatus === 'pending') {
                    $query->where('is_completed', false);
                }
            })
            ->when($this->filterPriority !== 'all', function ($query) {
                $query->where('priority', $this->filterPriority);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        return view('livewire.tasks.task-index', [
            'tasks' => $tasks,
        ])->layout('layouts.app');
    }
}

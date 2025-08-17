<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedRole = '';
    public $showAssignRoleModal = false;
    public $selectedUser = null;
    public $roleToAssign = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedRole' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedRole()
    {
        $this->resetPage();
    }

    public function openAssignRoleModal($userId)
    {
        $this->selectedUser = User::find($userId);
        $this->roleToAssign = $this->selectedUser->roles->first()?->name ?? '';
        $this->showAssignRoleModal = true;
    }

    public function closeAssignRoleModal()
    {
        $this->showAssignRoleModal = false;
        $this->selectedUser = null;
        $this->roleToAssign = '';
    }

    public function assignRole()
    {
        if ($this->selectedUser && $this->roleToAssign) {
            // Remove all existing roles and assign the new one
            $this->selectedUser->syncRoles([$this->roleToAssign]);

            session()->flash('message', "Peran berhasil ditetapkan kepada {$this->selectedUser->name}!");
            $this->closeAssignRoleModal();
        }
    }

    public function removeRole($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->syncRoles([]);
            session()->flash('message', "Semua peran berhasil dihapus dari {$user->name}!");
        }
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->selectedRole, function ($query) {
                $query->role($this->selectedRole);
            })
            ->with('roles')
            ->paginate(10);

        $roles = Role::all();

        return view('livewire.admin.user-index', [
            'users' => $users,
            'roles' => $roles,
        ])->layout('layouts.app');
    }
}

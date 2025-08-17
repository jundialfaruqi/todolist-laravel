<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteRole($roleId)
    {
        $role = Role::find($roleId);

        if ($role) {
            // Check if role is assigned to any users
            if ($role->users()->count() > 0) {
                session()->flash('error', 'Tidak dapat menghapus peran yang masih ditetapkan kepada pengguna!');
                return;
            }

            $role->delete();
            session()->flash('message', 'Peran berhasil dihapus!');
        }
    }

    public function render()
    {
        $roles = Role::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->withCount(['users', 'permissions'])
            ->paginate(10);

        return view('livewire.admin.role-index', [
            'roles' => $roles,
        ])->layout('layouts.app');
    }
}

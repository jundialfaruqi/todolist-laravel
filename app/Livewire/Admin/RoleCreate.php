<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleCreate extends Component
{
    public $name = '';
    public $selectedPermissions = [];

    protected $rules = [
        'name' => 'required|string|max:255|unique:roles,name',
        'selectedPermissions' => 'array',
    ];

    protected $messages = [
        'name.required' => 'Nama peran wajib diisi.',
        'name.unique' => 'Nama peran sudah ada.',
        'name.max' => 'Nama peran maksimal 255 karakter.',
    ];

    public function save()
    {
        $this->validate();

        $role = Role::create(['name' => strtolower($this->name)]);

        if (!empty($this->selectedPermissions)) {
            $role->syncPermissions($this->selectedPermissions);
        }

        session()->flash('message', 'Peran berhasil dibuat!');

        return $this->redirect(route('roles.index'), navigate: true);
    }

    public function render()
    {
        $permissions = Permission::all();

        return view('livewire.admin.role-create', [
            'permissions' => $permissions,
        ])->layout('layouts.app');
    }
}

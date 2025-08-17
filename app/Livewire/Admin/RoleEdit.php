<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleEdit extends Component
{
    public Role $role;
    public $name = '';
    public $selectedPermissions = [];

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:roles,name,' . $this->role->id,
            'selectedPermissions' => 'array',
        ];
    }

    protected $messages = [
        'name.required' => 'Nama peran wajib diisi.',
        'name.unique' => 'Nama peran sudah ada.',
        'name.max' => 'Nama peran maksimal 255 karakter.',
    ];

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->selectedPermissions = $role->permissions->pluck('name')->toArray();
    }

    public function save()
    {
        $this->validate();

        $this->role->update(['name' => strtolower($this->name)]);
        $this->role->syncPermissions($this->selectedPermissions);

        session()->flash('message', 'Peran berhasil diperbarui!');

        return $this->redirect(route('roles.index'), navigate: true);
    }

    public function render()
    {
        $permissions = Permission::all();

        return view('livewire.admin.role-edit', [
            'permissions' => $permissions,
        ])->layout('layouts.app');
    }
}

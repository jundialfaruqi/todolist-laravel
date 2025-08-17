<div>
    <x-page-header title="Edit Peran" description="Perbarui peran dan izinnya">
        <a href="{{ route('roles.index') }}" class="btn-secondary" wire:navigate>
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Kembali
        </a>
    </x-page-header>

    <div class="max-w-3xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="card">
            <div class="card-body">
                <form wire:submit="save" class="space-y-6">
                    <!-- Role Name -->
                    <div>
                        <label for="name" class="form-label">Nama Peran *</label>
                        <input type="text" id="name" wire:model="name"
                            class="form-input @error('name') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                            placeholder="Masukkan nama peran..." required />
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500">Nama peran akan disimpan dalam huruf kecil.</p>
                    </div>

                    <!-- Role Info -->
                    <div class="bg-gray-50 p-4 rounded-md">
                        <h4 class="text-sm font-medium text-gray-900 mb-2">Informasi Peran</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="text-gray-500">Jumlah Pengguna:</span>
                                <span class="font-medium">{{ $role->users()->count() }}</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Dibuat:</span>
                                <span class="font-medium">{{ $role->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Permissions -->
                    <div>
                        <label class="form-label">Izin</label>
                        <p class="text-sm text-gray-500 mb-3">Pilih izin yang akan diberikan kepada peran ini.</p>

                        @if ($permissions->count() > 0)
                            <div class="space-y-2">
                                @foreach ($permissions as $permission)
                                    <div class="flex items-center">
                                        <input type="checkbox" id="permission_{{ $permission->id }}"
                                            wire:model="selectedPermissions" value="{{ $permission->name }}"
                                            class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded" />
                                        <label for="permission_{{ $permission->id }}"
                                            class="ml-2 block text-sm text-gray-900">
                                            {{ ucfirst(str_replace('_', ' ', $permission->name)) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 text-sm">Belum ada izin yang tersedia.</p>
                        @endif
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                        <a href="{{ route('roles.index') }}" class="btn-secondary" wire:navigate>
                            Batal
                        </a>
                        <button type="submit" class="btn-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove>Perbarui Peran</span>
                            <span wire:loading>Memperbarui...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

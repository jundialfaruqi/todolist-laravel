<div>
    <x-page-header title="Manajemen Pengguna" description="Kelola pengguna dan peran mereka" />

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Flash Message -->
        @if (session()->has('message'))
            <div class="mb-4">
                <x-alert type="success" :message="session('message')" />
            </div>
        @endif

        <!-- Filters -->
        <div class="card mb-6">
            <div class="card-body">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Search -->
                    <div>
                        <label for="search" class="form-label">Cari Pengguna</label>
                        <input type="text" wire:model.live.debounce.300ms="search"
                            placeholder="Cari berdasarkan nama atau email..." class="form-input" />
                    </div>

                    <!-- Role Filter -->
                    <div>
                        <label for="selectedRole" class="form-label">Filter Peran</label>
                        <select wire:model.live="selectedRole" class="form-input">
                            <option value="">Semua Peran</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users List -->
        <div class="card">
            <div class="card-body">
                @if ($users->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pengguna
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Peran
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Bergabung
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center">
                                                        <span class="text-sm font-medium text-primary-700">
                                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $user->name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($user->roles->count() > 0)
                                                <div class="flex flex-wrap gap-1">
                                                    @foreach ($user->roles as $role)
                                                        <span
                                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-100 text-primary-800">
                                                            {{ ucfirst($role->name) }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="text-gray-400 text-sm">Tidak ada peran</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $user->created_at->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-2">
                                                <button wire:click="openAssignRoleModal({{ $user->id }})"
                                                    class="text-primary-600 hover:text-primary-900">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                @if ($user->roles->count() > 0)
                                                    <button wire:click="removeRole({{ $user->id }})"
                                                        wire:confirm="Apakah Anda yakin ingin menghapus semua peran dari pengguna ini?"
                                                        class="text-red-600 hover:text-red-900">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                            </path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada pengguna ditemukan</h3>
                        <p class="mt-1 text-sm text-gray-500">Coba ubah filter pencarian Anda.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Assign Role Modal -->
    @if ($showAssignRoleModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Tetapkan Peran
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Tetapkan peran untuk {{ $selectedUser?->name }}
                                    </p>
                                </div>
                                <div class="mt-4">
                                    <label for="roleToAssign" class="form-label">Pilih Peran</label>
                                    <select wire:model="roleToAssign" class="form-input">
                                        <option value="">Pilih peran...</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="assignRole" type="button" class="btn-primary w-full sm:w-auto sm:ml-3"
                            :disabled="!roleToAssign">
                            Tetapkan
                        </button>
                        <button wire:click="closeAssignRoleModal" type="button"
                            class="btn-secondary w-full sm:w-auto mt-3 sm:mt-0">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

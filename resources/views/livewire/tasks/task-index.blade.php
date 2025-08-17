<div>
    <x-page-header title="Daftar Tugas" description="Kelola semua tugas Anda">
        <a href="{{ route('tasks.create') }}" class="btn-primary" wire:navigate>
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Tugas
        </a>
    </x-page-header>

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
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Search -->
                    <div>
                        <label for="search" class="form-label">Cari Tugas</label>
                        <input type="text" wire:model.live.debounce.300ms="search"
                            placeholder="Cari berdasarkan judul atau deskripsi..." class="form-input" />
                    </div>

                    <!-- Status Filter -->
                    <div>
                        <label for="filterStatus" class="form-label">Status</label>
                        <select wire:model.live="filterStatus" class="form-input">
                            <option value="all">Semua Status</option>
                            <option value="pending">Pending</option>
                            <option value="completed">Selesai</option>
                        </select>
                    </div>

                    <!-- Priority Filter -->
                    <div>
                        <label for="filterPriority" class="form-label">Prioritas</label>
                        <select wire:model.live="filterPriority" class="form-input">
                            <option value="all">Semua Prioritas</option>
                            <option value="high">Tinggi</option>
                            <option value="medium">Sedang</option>
                            <option value="low">Rendah</option>
                        </select>
                    </div>

                    <!-- Sort -->
                    <div>
                        <label for="sortBy" class="form-label">Urutkan</label>
                        <select wire:model.live="sortBy" class="form-input">
                            <option value="created_at">Tanggal Dibuat</option>
                            <option value="due_date">Tenggat Waktu</option>
                            <option value="priority">Prioritas</option>
                            <option value="title">Judul</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks List -->
        <div class="card">
            <div class="card-body">
                @if ($tasks->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <button wire:click="sortBy('title')"
                                            class="flex items-center space-x-1 hover:text-gray-700">
                                            <span>Tugas</span>
                                            @if ($sortBy === 'title')
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    @if ($sortDirection === 'asc')
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                    @else
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    @endif
                                                </svg>
                                            @endif
                                        </button>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <button wire:click="sortBy('priority')"
                                            class="flex items-center space-x-1 hover:text-gray-700">
                                            <span>Prioritas</span>
                                            @if ($sortBy === 'priority')
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    @if ($sortDirection === 'asc')
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                    @else
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    @endif
                                                </svg>
                                            @endif
                                        </button>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <button wire:click="sortBy('due_date')"
                                            class="flex items-center space-x-1 hover:text-gray-700">
                                            <span>Tenggat</span>
                                            @if ($sortBy === 'due_date')
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    @if ($sortDirection === 'asc')
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                    @else
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    @endif
                                                </svg>
                                            @endif
                                        </button>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($tasks as $task)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div
                                                        class="h-10 w-10 rounded-full {{ $task->is_completed ? 'bg-green-100' : 'bg-gray-100' }} flex items-center justify-center">
                                                        @if ($task->is_completed)
                                                            <svg class="w-5 h-5 text-green-600" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                            </svg>
                                                        @else
                                                            <svg class="w-5 h-5 text-gray-400" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                </path>
                                                            </svg>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <div
                                                        class="text-sm font-medium text-gray-900 {{ $task->is_completed ? 'line-through' : '' }}">
                                                        {{ $task->title }}
                                                    </div>
                                                    @if ($task->description)
                                                        <div
                                                            class="text-sm text-gray-500 {{ $task->is_completed ? 'line-through' : '' }}">
                                                            {{ Str::limit($task->description, 50) }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $task->priority_color }}">
                                                {{ $task->priority_label }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if ($task->due_date)
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    {{ $task->due_date->format('d M Y') }}
                                                </div>
                                                @if ($task->due_date->isPast() && !$task->is_completed)
                                                    <span class="text-red-500 text-xs">Terlambat</span>
                                                @endif
                                            @else
                                                <span class="text-gray-400">-</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button wire:click="toggleComplete({{ $task->id }})"
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $task->is_completed ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ $task->is_completed ? 'Selesai' : 'Pending' }}
                                            </button>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-2">
                                                <a href="{{ route('tasks.edit', $task) }}"
                                                    class="text-primary-600 hover:text-primary-900" wire:navigate>
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <button wire:click="deleteTask({{ $task->id }})"
                                                    wire:confirm="Apakah Anda yakin ingin menghapus tugas ini?"
                                                    class="text-red-600 hover:text-red-900">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $tasks->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada tugas</h3>
                        <p class="mt-1 text-sm text-gray-500">Mulai dengan membuat tugas pertama Anda.</p>
                        <div class="mt-6">
                            <a href="{{ route('tasks.create') }}" class="btn-primary" wire:navigate>
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4"></path>
                                </svg>
                                Tambah Tugas
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

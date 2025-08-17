<div>
    <x-page-header title="Tambah Tugas Baru" description="Buat tugas baru untuk meningkatkan produktivitas Anda">
        <a href="{{ route('tasks.index') }}" class="btn-secondary" wire:navigate>
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
                    <!-- Title -->
                    <div>
                        <label for="title" class="form-label">Judul Tugas *</label>
                        <input type="text" id="title" wire:model="title"
                            class="form-input @error('title') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                            placeholder="Masukkan judul tugas..." required />
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea id="description" wire:model="description" rows="4"
                            class="form-input @error('description') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                            placeholder="Masukkan deskripsi tugas (opsional)..."></textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Due Date and Priority -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Due Date -->
                        <div>
                            <label for="due_date" class="form-label">Tenggat Waktu</label>
                            <input type="date" id="due_date" wire:model="due_date"
                                class="form-input @error('due_date') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                                min="{{ date('Y-m-d') }}" />
                            @error('due_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Priority -->
                        <div>
                            <label for="priority" class="form-label">Prioritas *</label>
                            <select id="priority" wire:model="priority"
                                class="form-input @error('priority') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                                required>
                                <option value="low">Rendah</option>
                                <option value="medium">Sedang</option>
                                <option value="high">Tinggi</option>
                            </select>
                            @error('priority')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                        <a href="{{ route('tasks.index') }}" class="btn-secondary" wire:navigate>
                            Batal
                        </a>
                        <button type="submit" class="btn-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove>Simpan Tugas</span>
                            <span wire:loading>Menyimpan...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

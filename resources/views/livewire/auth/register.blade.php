<div>
    <div class="mb-4 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Buat Akun Baru</h2>
        <p class="mt-2 text-sm text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:text-primary-500" wire:navigate>
                Masuk di sini
            </a>
        </p>
    </div>

    <form wire:submit="register" class="space-y-6">
        <!-- Name -->
        <div>
            <label for="name" class="form-label">Nama Lengkap</label>
            <input id="name" type="text" wire:model="name"
                class="form-input @error('name') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                placeholder="Masukkan nama lengkap Anda" required autofocus />
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" wire:model="email"
                class="form-input @error('email') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                placeholder="Masukkan email Anda" required />
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" wire:model="password"
                class="form-input @error('password') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                placeholder="Masukkan password Anda" required />
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" wire:model="password_confirmation" class="form-input"
                placeholder="Konfirmasi password Anda" required />
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="btn-primary w-full justify-center" wire:loading.attr="disabled">
                <span wire:loading.remove>Daftar</span>
                <span wire:loading>Memproses...</span>
            </button>
        </div>
    </form>
</div>

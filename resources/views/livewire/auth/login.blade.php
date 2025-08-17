<div>
    <div class="mb-4 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Masuk ke Akun Anda</h2>
        <p class="mt-2 text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-500" wire:navigate>
                Daftar di sini
            </a>
        </p>
    </div>

    <form wire:submit="login" class="space-y-6">
        <!-- Email Address -->
        <div>
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" wire:model="email"
                class="form-input @error('email') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                placeholder="Masukkan email Anda" required autofocus />
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

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember" type="checkbox" wire:model="remember"
                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded" />
            <label for="remember" class="ml-2 block text-sm text-gray-900">
                Ingat saya
            </label>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="btn-primary w-full justify-center" wire:loading.attr="disabled">
                <span wire:loading.remove>Masuk</span>
                <span wire:loading>Memproses...</span>
            </button>
        </div>
    </form>
</div>

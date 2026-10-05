<div class="w-full max-w-md">
    <div class="mb-6 text-center">
        <div class="mb-4 flex justify-center">
            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-400 to-emerald-700 shadow-lg shadow-amber-500/20">
                <x-application-logo class="h-10 w-10 text-white" />
            </div>
        </div>
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">Masuk ke Akun</h2>
        <p class="mt-2 text-sm text-slate-500">Silakan masuk untuk mengakses dashboard masjid</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5 rounded-3xl border border-slate-200 bg-white/90 p-6 shadow-[0_18px_50px_rgba(15,23,42,0.08)] backdrop-blur-sm sm:p-7">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-slate-700" />
            <x-text-input id="email" class="mt-2 block w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm transition focus:border-amber-400 focus:bg-white focus:ring-2 focus:ring-amber-200" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-slate-700" />
            </div>
            <x-text-input id="password" class="mt-2 block w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm transition focus:border-amber-400 focus:bg-white focus:ring-2 focus:ring-amber-200" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-slate-300 text-amber-600 shadow-sm focus:ring-amber-500" name="remember">
                <span class="ms-2 text-sm text-slate-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-medium text-amber-700 transition hover:text-amber-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center rounded-2xl bg-gradient-to-r from-amber-500 to-emerald-700 px-4 py-3 text-base font-semibold text-white shadow-lg shadow-amber-500/20 transition hover:opacity-95 focus:ring-4 focus:ring-amber-200">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>

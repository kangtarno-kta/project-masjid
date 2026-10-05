<x-guest-layout>
    <div class="space-y-6">
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-slate-200">
                    Email
                </label>
                <div class="relative">
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        class="block w-full rounded-2xl border border-white/10 bg-slate-900/70 px-4 py-3.5 text-base text-white placeholder:text-slate-400 shadow-[inset_0_1px_2px_rgba(15,23,42,0.7)] transition duration-200 focus:border-amber-400/70 focus:outline-none focus:ring-4 focus:ring-amber-400/15"
                        placeholder="you@example.com"
                    >
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <div class="mb-2 flex items-center justify-between gap-3">
                    <label for="password" class="text-sm font-medium text-slate-200">
                        Password
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs font-medium text-amber-300 transition hover:text-amber-200">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    class="block w-full rounded-2xl border border-white/10 bg-slate-900/70 px-4 py-3.5 text-base text-white placeholder:text-slate-400 shadow-[inset_0_1px_2px_rgba(15,23,42,0.7)] transition duration-200 focus:border-amber-400/70 focus:outline-none focus:ring-4 focus:ring-amber-400/15"
                    placeholder="••••••••"
                >
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between pt-2">
                <label for="remember_me" class="inline-flex items-center gap-3 text-sm text-slate-300">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="h-4 w-4 rounded border-white/20 bg-slate-900 text-amber-400 focus:ring-amber-400/50"
                    >
                    <span>Ingat saya</span>
                </label>
            </div>

            <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-amber-300 via-yellow-400 to-amber-500 px-4 py-3.5 text-sm font-semibold text-slate-900 shadow-[0_14px_35px_rgba(245,158,11,0.4)] transition duration-200 hover:scale-[1.01] hover:shadow-[0_18px_40px_rgba(245,158,11,0.48)] focus:outline-none focus:ring-4 focus:ring-amber-300/30">
                Masuk
            </button>
        </form>

        <div class="relative flex items-center justify-center py-2">
            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-white/10"></div></div>
            <span class="relative bg-slate-950 px-3 text-[11px] uppercase tracking-[0.25em] text-slate-400">atau</span>
        </div>

        <div class="text-center text-sm text-slate-300">
            Belum punya akun?
            <a href="{{ route('register') }}" class="ml-1 font-semibold text-amber-300 transition hover:text-amber-200">
                Daftar sekarang
            </a>
        </div>
    </div>
</x-guest-layout>

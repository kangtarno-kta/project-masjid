<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-800 antialiased">
        <div class="relative min-h-screen overflow-hidden bg-[#f4efe7]">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(251,191,36,0.25),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(14,116,144,0.18),_transparent_30%)]"></div>
            <div class="absolute inset-0 bg-[linear-gradient(135deg,rgba(255,255,255,0.72),rgba(248,242,232,0.85))]"></div>

            <div class="relative z-10 flex min-h-screen items-center justify-center px-4 py-8 sm:px-6 lg:px-8">
                <div class="w-full max-w-5xl overflow-hidden rounded-[30px] border border-amber-200/80 bg-white/80 shadow-[0_30px_80px_rgba(120,96,60,0.13)] backdrop-blur-sm">
                    <div class="grid md:grid-cols-[1.08fr_0.92fr]">
                        <div class="hidden md:flex relative overflow-hidden bg-gradient-to-br from-[#0f172a] via-[#1f3f3b] to-[#d97706] p-10 text-white">
                            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(251,191,36,0.35),_transparent_18%),linear-gradient(rgba(255,255,255,0.02),rgba(255,255,255,0.08))]"></div>
                            <div class="relative z-10 flex h-full flex-col justify-between">
                                <div>
                                    <a href="/" class="inline-flex items-center gap-3 text-sm font-medium text-amber-100">
                                        <x-application-logo class="h-12 w-12 rounded-full bg-white/10 p-2 text-white" />
                                        <span class="text-lg font-semibold tracking-wide">Masjid</span>
                                    </a>
                                </div>

                                <div class="space-y-6">
                                    <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1 text-xs uppercase tracking-[0.2em] text-amber-100">
                                        Sistem Informasi
                                    </div>
                                    <div class="space-y-3">
                                        <h1 class="text-3xl font-bold leading-tight">
                                            Kelola aktivitas masjid dengan lebih mudah.
                                        </h1>
                                        <p class="max-w-sm text-sm leading-6 text-amber-50/80">
                                            Pantau jadwal, keuangan, dan kebutuhan jamaah dalam satu platform yang aman dan terintegrasi.
                                        </p>
                                    </div>
                                </div>

                                <div class="grid gap-3 sm:grid-cols-3">
                                    <div class="rounded-2xl border border-white/15 bg-white/5 p-3 backdrop-blur-sm">
                                        <div class="text-lg font-bold text-amber-200">24/7</div>
                                        <div class="text-[11px] uppercase tracking-[0.18em] text-amber-50/70">Akses</div>
                                    </div>
                                    <div class="rounded-2xl border border-white/15 bg-white/5 p-3 backdrop-blur-sm">
                                        <div class="text-lg font-bold text-amber-200">100%</div>
                                        <div class="text-[11px] uppercase tracking-[0.18em] text-amber-50/70">Aman</div>
                                    </div>
                                    <div class="rounded-2xl border border-white/15 bg-white/5 p-3 backdrop-blur-sm">
                                        <div class="text-lg font-bold text-amber-200">Fast</div>
                                        <div class="text-[11px] uppercase tracking-[0.18em] text-amber-50/70">Tools</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full p-6 sm:p-8 lg:p-10">
                            <div class="mb-8 flex items-center justify-between">
                                <div class="md:hidden">
                                    <a href="/" class="inline-flex items-center gap-3 text-sm font-medium text-slate-700">
                                        <x-application-logo class="h-10 w-10 rounded-full bg-amber-100 p-2 text-amber-700" />
                                        <span class="text-base font-semibold">Masjid</span>
                                    </a>
                                </div>
                            </div>

                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

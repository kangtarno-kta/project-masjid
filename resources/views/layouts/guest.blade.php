<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cinzel:wght@500;600;700;800&family=inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen relative overflow-hidden bg-slate-950">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(245,158,11,0.18),transparent_40%),linear-gradient(135deg,#0f172a_0%,#111827_35%,#1e293b_100%)]"></div>
            <div class="absolute inset-0 opacity-20" style="background-image: linear-gradient(rgba(255,255,255,0.08) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.08) 1px, transparent 1px); background-size: 40px 40px;"></div>

            <div class="relative z-10 min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-10">
                <div class="w-full max-w-6xl overflow-hidden rounded-[32px] border border-white/10 bg-white/5 shadow-[0_40px_120px_rgba(15,23,42,0.7)] backdrop-blur-xl">
                    <div class="grid lg:grid-cols-[1.1fr_0.9fr]">
                        <div class="relative hidden lg:block min-h-[700px] overflow-hidden">
                            <img
                                src="https://images.unsplash.com/photo-1507692049790-de58290a4334?auto=format&fit=crop&w=1200&q=80"
                                alt="Masjid"
                                class="h-full w-full object-cover"
                            >
                            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/80 via-slate-900/40 to-transparent"></div>

                            <div class="absolute inset-0 flex flex-col justify-end p-10 text-white">
                                <div class="mb-4 inline-flex w-fit items-center gap-2 rounded-full border border-amber-300/50 bg-amber-400/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.24em] text-amber-200">
                                    Masjid Albarokah
                                </div>
                                <h1 class="font-[Cinzel] text-4xl font-bold leading-tight text-white">
                                    Bersama menebar keberkahan dan kedamaian.
                                </h1>
                                <p class="mt-4 max-w-md text-base text-slate-200">
                                    Platform administrasi masjid untuk mengelola jadwal sholat, kegiatan, berita, dan layanan umat.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center justify-center bg-slate-950/80 px-5 py-8 sm:px-8 lg:px-12">
                            <div class="w-full max-w-md">
                                <div class="mb-8 text-center lg:text-left">
                                    <div class="mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-2xl border border-amber-300/40 bg-gradient-to-br from-amber-300/20 to-yellow-500/5 shadow-[0_0_35px_rgba(245,158,11,0.2)] lg:mx-0">
                                        <svg viewBox="0 0 64 64" class="h-12 w-12 text-amber-300" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M32 9L39 15V18H48V27H42V33H48V52H16V33H22V27H16V18H25V15L32 9ZM28 18H36V21H28V18ZM20 27H44V33H20V27ZM24 36H40V46H24V36Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-300/80">
                                        admin portal
                                    </p>
                                    <h2 class="mt-3 font-[Cinzel] text-3xl font-bold text-white">
                                        Selamat Datang
                                    </h2>
                                </div>

                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

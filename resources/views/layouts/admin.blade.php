<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Dashboard Admin') - Masjid Al-Barokah
    </title>

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Bootstrap 5 --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- Admin CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/admin.css') }}">

    {{-- CSS tambahan halaman --}}
    @stack('styles')
</head>

<body>

    <div class="admin-wrapper">

        {{-- =====================================================
            SIDEBAR
        ====================================================== --}}
        <aside class="admin-sidebar">

            <div class="sidebar-brand">

                <div class="brand-icon">
                    <i class="bi bi-moon-stars-fill"></i>
                </div>

                <div>
                    <strong>Al-Barokah</strong>
                    <small>Admin Panel</small>
                </div>

            </div>

            <hr>

            <nav class="sidebar-menu">

                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}"
                    class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>

                </a>

                {{-- Manajemen User --}}
                <a href="{{ route('admin.pengguna.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.pengguna.*') ? 'active' : '' }}">

                    <i class="bi bi-people-fill"></i>
                    <span>Manajemen User</span>

                </a>

                {{-- Berita --}}
                <a href="{{ route('admin.berita.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">

                    <i class="bi bi-newspaper"></i>
                    <span>Berita</span>

                </a>

                {{-- Kegiatan --}}
                <a href="#"
                    class="sidebar-link">

                    <i class="bi bi-calendar-event"></i>
                    <span>Kegiatan</span>

                </a>

                {{-- Kajian --}}
                <a href="#"
                    class="sidebar-link">

                    <i class="bi bi-book"></i>
                    <span>Kajian</span>

                </a>

                {{-- Galeri --}}
                <a href="#"
                    class="sidebar-link">

                    <i class="bi bi-images"></i>
                    <span>Galeri</span>

                </a>

                {{-- Profil Masjid --}}
                <a href="#"
                    class="sidebar-link">

                    <i class="bi bi-mosque"></i>
                    <span>Profil Masjid</span>

                </a>

                {{-- Jadwal Sholat --}}
                <a href="#"
                    class="sidebar-link">

                    <i class="bi bi-clock"></i>
                    <span>Jadwal Sholat</span>

                </a>

                {{-- Keuangan DKM --}}
                <a href="#"
                    class="sidebar-link">

                    <i class="bi bi-wallet2"></i>
                    <span>Keuangan DKM</span>

                </a>

            </nav>

        </aside>


        {{-- =====================================================
            MAIN AREA
        ====================================================== --}}
        <div class="admin-main">

            {{-- HEADER --}}
            <header class="admin-header">

                <div>
                    <h5 class="mb-0">
                        @yield('page-title', 'Dashboard')
                    </h5>
                </div>

                {{-- User Menu --}}
                <div class="dropdown">

                    <button
                        class="btn btn-light dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <i class="bi bi-person-circle me-1"></i>

                        {{ auth()->user()->name }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        {{-- Profile --}}
                        <li>
                            <a
                                class="dropdown-item"
                                href="{{ route('profile.edit') }}">

                                <i class="bi bi-person me-2"></i>
                                Profil

                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        {{-- Logout --}}
                        <li>

                            <form
                                method="POST"
                                action="{{ route('logout') }}"
                                class="m-0">

                                @csrf

                                <button
                                    type="submit"
                                    class="dropdown-item text-danger">

                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            </header>


            {{-- =================================================
                CONTENT
            ================================================== --}}
            <main class="admin-content">

                @yield('content')

            </main>

        </div>

    </div>


    {{-- =========================================================
        BOOTSTRAP JAVASCRIPT
    ========================================================== --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


    {{-- =========================================================
    SWEETALERT2
========================================================= --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session()->has('success'))
    <script>
        window.addEventListener('load', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                timer: 2200,
                showConfirmButton: false
            });
        });
    </script>
    @endif

    @if (session()->has('error'))
    <script>
        window.addEventListener('load', function() {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('error') }}",
                confirmButtonText: 'OK'
            });
        });
    </script>
    @endif

    @if ($errors->any())
    <script>
        window.addEventListener('load', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Periksa Data',
                text: 'Ada data yang belum diisi dengan benar.',
                confirmButtonText: 'Perbaiki'
            });
        });
    </script>
    @endif

    @stack('scripts')

</body>

</html>

</body>

</html>
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm sticky-top">
    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold d-flex align-items-center"
            href="{{ url('/') }}">

            <i class="bi bi-moon-stars-fill text-warning me-2 fs-4"></i>

            <div>
                <div class="fw-bold">
                    Al-Barokah
                </div>

                <small class="text-light opacity-75">
                    Masjid Perum Bumi Indah Tahap 4
                </small>
            </div>
        </a>


        {{-- Tombol Mobile --}}
        <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMasjid">

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- Menu --}}
        <div class="collapse navbar-collapse"
            id="navbarMasjid">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Beranda
                    </a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                        href="#"
                        data-bs-toggle="dropdown">

                        Profil
                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item" href="#">
                                Sejarah
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="#">
                                Visi & Misi
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="#">
                                Struktur DKM
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Kegiatan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Berita
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Kajian
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Galeri
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Jadwal Sholat
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Keuangan
                    </a>
                </li>


                {{-- Login Admin --}}
                <li class="nav-item ms-lg-3">

                    @auth

                    <a href="{{ route('admin.dashboard') }}"
                        class="btn btn-warning rounded-pill px-3">

                        <i class="bi bi-speedometer2 me-1"></i>
                        Dashboard

                    </a>

                    @else

                    <a href="{{ route('login') }}"
                        class="btn btn-warning rounded-pill px-3">

                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        Login

                    </a>

                    @endauth

                </li>

            </ul>

        </div>

    </div>
</nav>
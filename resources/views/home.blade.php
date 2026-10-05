@extends('layouts.frontend')

@section('title', 'Beranda - Masjid Al-Barokah')

@section('description')
Website resmi Masjid Al-Barokah Perum Bumi Indah Tahap 4.
@endsection

@section('content')

{{-- =========================
     HERO / SLIDER
========================= --}}
<section class="py-5 bg-light">

    <div class="container">

        <div id="heroMasjid"
            class="carousel slide carousel-fade shadow rounded-4 overflow-hidden"
            data-bs-ride="carousel"
            data-bs-interval="5000">

            <div class="carousel-inner">

                <div class="carousel-item active">

                    <div class="p-5 text-white bg-success"
                        style="min-height: 420px;">

                        <div class="row align-items-center h-100">

                            <div class="col-lg-7">

                                <span class="badge bg-warning text-dark mb-3">
                                    Selamat Datang
                                </span>

                                <h1 class="display-4 fw-bold">
                                    Masjid Al-Barokah
                                </h1>

                                <p class="lead">
                                    Pusat ibadah, dakwah, pendidikan,
                                    dan kebersamaan umat.
                                </p>

                                <a href="#tentang"
                                    class="btn btn-warning rounded-pill px-4">

                                    <i class="bi bi-arrow-down-circle me-2"></i>
                                    Jelajahi Website

                                </a>

                            </div>

                            <div class="col-lg-5 text-center">

                                <i class="bi bi-moon-stars-fill"
                                    style="font-size: 180px; opacity:.2;">
                                </i>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="carousel-item">

                    <div class="p-5 text-white bg-dark"
                        style="min-height: 420px;">

                        <div class="row align-items-center h-100">

                            <div class="col-lg-7">

                                <h2 class="display-5 fw-bold">
                                    Bersama Memakmurkan Masjid
                                </h2>

                                <p class="lead">
                                    Membangun ukhuwah dan memberikan
                                    manfaat bagi jamaah serta masyarakat.
                                </p>

                            </div>

                            <div class="col-lg-5 text-center">

                                <i class="bi bi-people-fill"
                                    style="font-size: 160px; opacity:.2;">
                                </i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <button class="carousel-control-prev"
                type="button"
                data-bs-target="#heroMasjid"
                data-bs-slide="prev">

                <span class="carousel-control-prev-icon"></span>

            </button>

            <button class="carousel-control-next"
                type="button"
                data-bs-target="#heroMasjid"
                data-bs-slide="next">

                <span class="carousel-control-next-icon"></span>

            </button>

        </div>

    </div>

</section>


{{-- =========================
     TENTANG
========================= --}}
<section id="tentang" class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-success fw-semibold">
                MASJID AL-BAROKAH
            </span>

            <h2 class="fw-bold mt-2">
                Menjadi Masjid yang Bermanfaat
            </h2>

            <p class="text-muted">
                Tempat ibadah, pembinaan umat, dan pusat kegiatan
                masyarakat yang aman, nyaman, dan terbuka.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body text-center p-4">

                        <i class="bi bi-moon-stars-fill
                                  fs-1 text-success">
                        </i>

                        <h5 class="fw-bold mt-3">
                            Ibadah
                        </h5>

                        <p class="text-muted mb-0">
                            Menjadikan masjid sebagai pusat ibadah
                            dan peningkatan ketakwaan kepada Allah SWT.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body text-center p-4">

                        <i class="bi bi-book-half
                                  fs-1 text-success">
                        </i>

                        <h5 class="fw-bold mt-3">
                            Pendidikan
                        </h5>

                        <p class="text-muted mb-0">
                            Mendukung kegiatan kajian dan pendidikan
                            keislaman bagi jamaah.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body text-center p-4">

                        <i class="bi bi-people-fill
                                  fs-1 text-success">
                        </i>

                        <h5 class="fw-bold mt-3">
                            Kebersamaan
                        </h5>

                        <p class="text-muted mb-0">
                            Membangun ukhuwah Islamiyah dan kepedulian
                            sosial di lingkungan masyarakat.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     MENU CEPAT
========================= --}}
<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-4">

            <h2 class="fw-bold">
                Layanan Masjid
            </h2>

            <p class="text-muted">
                Informasi dan layanan untuk jamaah
            </p>

        </div>


        <div class="row g-3">

            @php

            $layanan = [

            [
            'icon' => 'bi-calendar-event',
            'title' => 'Kegiatan',
            ],

            [
            'icon' => 'bi-newspaper',
            'title' => 'Berita',
            ],

            [
            'icon' => 'bi-mic',
            'title' => 'Kajian',
            ],

            [
            'icon' => 'bi-images',
            'title' => 'Galeri',
            ],

            [
            'icon' => 'bi-clock',
            'title' => 'Jadwal Sholat',
            ],

            [
            'icon' => 'bi-wallet2',
            'title' => 'Keuangan DKM',
            ],

            ];

            @endphp


            @foreach ($layanan as $item)

            <div class="col-6 col-md-4 col-lg-2">

                <a href="#"
                    class="text-decoration-none">

                    <div class="card border-0 shadow-sm
                                    rounded-4 text-center
                                    h-100">

                        <div class="card-body py-4">

                            <i class="bi {{ $item['icon'] }}
                                          fs-2 text-success">
                            </i>

                            <div class="mt-2 fw-semibold text-dark">
                                {{ $item['title'] }}
                            </div>

                        </div>

                    </div>

                </a>

            </div>

            @endforeach

        </div>

    </div>

</section>


{{-- =========================
     {{-- =========================
     BERITA TERBARU
========================= --}}
<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-success fw-semibold">
                INFORMASI TERBARU
            </span>

            <h2 class="fw-bold mt-2">
                Berita Masjid
            </h2>

            <p class="text-muted">
                Informasi dan kabar terbaru Masjid Al-Barokah
            </p>

        </div>


        <div class="row g-4">

            @forelse ($berita as $item)

            <div class="col-md-6 col-lg-4">

                <article class="card border-0 shadow-sm
                                    rounded-4 overflow-hidden h-100">

                    {{-- Gambar --}}
                    @if ($item->gambar)

                    <img src="{{ asset('storage/' . $item->gambar) }}"
                        class="card-img-top"
                        alt="{{ $item->judul }}"
                        style="height: 220px; object-fit: cover;">

                    @else

                    <div class="d-flex align-items-center
                                        justify-content-center
                                        bg-light"
                        style="height: 220px;">

                        <i class="bi bi-newspaper
                                          text-success"
                            style="font-size: 60px;">
                        </i>

                    </div>

                    @endif


                    <div class="card-body p-4">

                        <small class="text-success">

                            <i class="bi bi-calendar3 me-1"></i>

                            {{ $item->created_at->format('d M Y') }}

                        </small>


                        <h5 class="fw-bold mt-2">

                            {{ $item->judul }}

                        </h5>


                        <p class="text-muted">

                            {{ $item->ringkasan }}

                        </p>


                        <a href="{{ route('berita.show', $item->slug) }}"
                            class="text-success text-decoration-none fw-semibold">

                            Baca Selengkapnya

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </article>

            </div>

            @empty

            <div class="col-12">

                <div class="text-center py-5">

                    <i class="bi bi-newspaper
                                  text-muted"
                        style="font-size: 50px;">
                    </i>

                    <h5 class="mt-3">
                        Belum ada berita
                    </h5>

                    <p class="text-muted">
                        Berita terbaru akan ditampilkan di sini.
                    </p>

                </div>

            </div>

            @endforelse

        </div>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="bg-success text-white rounded-4 p-5 text-center">

            <i class="bi bi-heart-fill text-warning fs-1"></i>

            <h2 class="fw-bold mt-3">
                Mari Memakmurkan Masjid
            </h2>

            <p class="lead mb-4">
                Bersama-sama membangun masjid yang
                memberikan manfaat bagi umat.
            </p>

            <a href="#"
                class="btn btn-warning rounded-pill px-4">

                <i class="bi bi-chat-dots me-2"></i>
                Kotak Saran

            </a>

        </div>

    </div>

</section>

@endsection
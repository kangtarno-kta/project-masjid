@extends('layouts.app')

@section('title', 'Beranda | Masjid Al-Barokah')
@section('description', 'Informasi kegiatan dan pelayanan Masjid Al-Barokah')

@section('content')

<section class="hero-section py-5">
    <div class="container">
        <div class="hero-card p-4 p-lg-5">
            <span class="badge text-bg-warning mb-3">
                Assalamu’alaikum Warahmatullahi Wabarakatuh
            </span>

            <h1 class="display-5 fw-bold">
                Selamat Datang di Masjid Al-Barokah
            </h1>

            <p class="lead mt-3">
                Pusat ibadah, ilmu, ukhuwah, dan pelayanan umat.
            </p>

            <a href="#profil" class="btn btn-gold mt-3">
                Mengenal Masjid Kami
            </a>
        </div>
    </div>
</section>

<section id="profil" class="container py-5">
    <h2 class="fw-bold">Profil Masjid</h2>
    <p>
        Masjid Al-Barokah hadir sebagai tempat ibadah dan
        kegiatan keislaman bagi jamaah dan warga sekitar.
    </p>
</section>

<section id="kegiatan" class="container py-4">
    <h2 class="fw-bold">Kegiatan Masjid</h2>
    <p>
        Informasi kajian, kegiatan sosial, dan program DKM
        akan ditampilkan di bagian ini.
    </p>
</section>

<section id="kontak" class="container py-4">
    <h2 class="fw-bold">Hubungi Kami</h2>
    <p>Informasi dan saran untuk pengurus DKM.</p>
</section>

@endsection
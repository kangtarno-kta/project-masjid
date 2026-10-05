@extends('layouts.frontend')

@section('title', $berita->judul . ' - Masjid Al-Barokah')

@section('description', $berita->ringkasan ?? $berita->judul)

@section('content')

<section class="py-5 bg-light">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <article class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    {{-- Gambar Berita --}}
                    @if ($berita->gambar)

                    <img
                        src="{{ asset('storage/' . $berita->gambar) }}"
                        alt="{{ $berita->judul }}"
                        class="w-100"
                        style="max-height: 480px; object-fit: cover;">

                    @endif


                    <div class="card-body p-4 p-lg-5">

                        {{-- Tanggal --}}
                        <div class="text-success mb-3">

                            <i class="bi bi-calendar3 me-1"></i>

                            {{ $berita->created_at->translatedFormat('d F Y') }}

                        </div>


                        {{-- Judul --}}
                        <h1 class="fw-bold mb-4">

                            {{ $berita->judul }}

                        </h1>


                        {{-- Ringkasan --}}
                        @if ($berita->ringkasan)

                        <div class="alert alert-light border-start border-success border-4">

                            <strong>
                                {{ $berita->ringkasan }}
                            </strong>

                        </div>

                        @endif


                        {{-- Isi Berita --}}
                        <div class="berita-content">

                            {!! nl2br(e($berita->isi)) !!}

                        </div>


                        {{-- Kembali --}}
                        <div class="mt-5">

                            <a
                                href="{{ route('home') }}"
                                class="btn btn-success rounded-pill px-4">

                                <i class="bi bi-arrow-left me-2"></i>

                                Kembali ke Beranda

                            </a>

                        </div>

                    </div>

                </article>

            </div>

        </div>

    </div>

</section>

@endsection
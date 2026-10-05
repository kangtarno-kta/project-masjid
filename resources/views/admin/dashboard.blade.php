@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard Admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold">
            Assalamu'alaikum,
            {{ auth()->user()->name }}
        </h2>

        <p class="text-muted">
            Selamat datang di Dashboard Masjid Al-Barokah.
        </p>

    </div>


    <div class="row g-4">

        <div class="col-md-6 col-xl-3">

            <div class="dashboard-card">

                <div class="card-icon">
                    📰
                </div>

                <div>
                    <h3>0</h3>
                    <span>Berita</span>
                </div>

            </div>

        </div>


        <div class="col-md-6 col-xl-3">

            <div class="dashboard-card">

                <div class="card-icon">
                    📅
                </div>

                <div>
                    <h3>0</h3>
                    <span>Kegiatan</span>
                </div>

            </div>

        </div>


        <div class="col-md-6 col-xl-3">

            <div class="dashboard-card">

                <div class="card-icon">
                    📖
                </div>

                <div>
                    <h3>0</h3>
                    <span>Kajian</span>
                </div>

            </div>

        </div>


        <div class="col-md-6 col-xl-3">

            <div class="dashboard-card">

                <div class="card-icon">
                    🖼️
                </div>

                <div>
                    <h3>0</h3>
                    <span>Galeri</span>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-pencil-square me-2"></i>
                Edit Berita
            </h3>

            <p class="text-muted mb-0">
                Perbarui informasi berita Masjid Al-Barokah.
            </p>
        </div>

        <a href="{{ route('admin.berita.index') }}"
            class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>

    </div>


    {{-- Error --}}

    @if ($errors->any())

    <div class="alert alert-danger">

        <strong>
            <i class="bi bi-exclamation-triangle me-2"></i>
            Terdapat kesalahan:
        </strong>

        <ul class="mb-0 mt-2">

            @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route('admin.berita.update', ['berita' => $berita->id]) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @method('PUT')


                {{-- Judul --}}

                <div class="mb-4">

                    <label for="judul"
                        class="form-label fw-semibold">

                        Judul Berita
                        <span class="text-danger">*</span>

                    </label>

                    <input type="text"
                        name="judul"
                        id="judul"
                        value="{{ old('judul', $berita->judul) }}"
                        class="form-control form-control-lg @error('judul') is-invalid @enderror">

                    @error('judul')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>


                {{-- Ringkasan --}}

                <div class="mb-4">

                    <label for="ringkasan"
                        class="form-label fw-semibold">

                        Ringkasan

                    </label>

                    <textarea name="ringkasan"
                        id="ringkasan"
                        rows="3"
                        class="form-control @error('ringkasan') is-invalid @enderror">{{ old('ringkasan', $berita->ringkasan) }}</textarea>

                    @error('ringkasan')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>


                {{-- Isi --}}

                <div class="mb-4">

                    <label for="isi"
                        class="form-label fw-semibold">

                        Isi Berita
                        <span class="text-danger">*</span>

                    </label>

                    <textarea name="isi"
                        id="isi"
                        rows="12"
                        class="form-control @error('isi') is-invalid @enderror">{{ old('isi', $berita->isi) }}</textarea>

                    @error('isi')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror

                </div>


                <div class="row">

                    {{-- Gambar --}}

                    <div class="col-md-8 mb-4">

                        <label class="form-label fw-semibold">
                            Gambar Berita
                        </label>

                        @if($berita->gambar)

                        <div class="mb-3">

                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                alt="{{ $berita->judul }}"
                                class="img-fluid rounded shadow-sm"
                                style="max-height:220px;">

                        </div>

                        @endif

                        <input type="file"
                            name="gambar"
                            class="form-control @error('gambar') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.webp">

                        <div class="form-text">
                            Kosongkan jika tidak ingin mengganti gambar.
                            Maksimal 2 MB.
                        </div>

                        @error('gambar')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror

                    </div>


                    {{-- Status --}}

                    <div class="col-md-4 mb-4">

                        <label for="status"
                            class="form-label fw-semibold">

                            Status

                        </label>

                        <select name="status"
                            id="status"
                            class="form-select">

                            <option value="draft"
                                {{ old('status', $berita->status) === 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                            <option value="published"
                                {{ old('status', $berita->status) === 'published' ? 'selected' : '' }}>
                                Published
                            </option>

                        </select>

                    </div>

                </div>


                <hr class="my-4">


                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('admin.berita.index') }}"
                        class="btn btn-light">

                        Batal

                    </a>

                    <button type="submit"
                        class="btn btn-primary px-4">

                        <i class="bi bi-save me-1"></i>

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
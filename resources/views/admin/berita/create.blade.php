@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-plus-circle me-2"></i>
                Tambah Berita
            </h3>

            <p class="text-muted mb-0">
                Tambahkan berita atau informasi terbaru Masjid Al-Barokah.
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
        <div class="fw-bold mb-2">
            <i class="bi bi-exclamation-triangle me-2"></i>
            Periksa kembali data berikut:
        </div>

        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route('admin.berita.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                {{-- Judul --}}
                <div class="mb-4">
                    <label for="judul" class="form-label fw-semibold">
                        Judul Berita
                        <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                        name="judul"
                        id="judul"
                        class="form-control form-control-lg @error('judul') is-invalid @enderror"
                        value="{{ old('judul') }}"
                        placeholder="Contoh: Kajian Rutin Ahad Pagi"
                        required>

                    @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Ringkasan --}}
                <div class="mb-4">
                    <label for="ringkasan" class="form-label fw-semibold">
                        Ringkasan
                    </label>

                    <textarea name="ringkasan"
                        id="ringkasan"
                        rows="3"
                        class="form-control @error('ringkasan') is-invalid @enderror"
                        placeholder="Tuliskan ringkasan singkat berita...">{{ old('ringkasan') }}</textarea>

                    @error('ringkasan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Isi Berita --}}
                <div class="mb-4">
                    <label for="isi" class="form-label fw-semibold">
                        Isi Berita
                        <span class="text-danger">*</span>
                    </label>

                    <textarea name="isi"
                        id="isi"
                        rows="10"
                        class="form-control @error('isi') is-invalid @enderror"
                        placeholder="Tuliskan isi berita..."
                        required>{{ old('isi') }}</textarea>

                    @error('isi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row">

                    {{-- Gambar --}}
                    <div class="col-md-8 mb-4">

                        <label for="gambar" class="form-label fw-semibold">
                            Gambar Berita
                        </label>

                        <input type="file"
                            name="gambar"
                            id="gambar"
                            class="form-control @error('gambar') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.webp">

                        <div class="form-text">
                            JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.
                        </div>

                        @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    {{-- Status --}}
                    <div class="col-md-4 mb-4">

                        <label for="status" class="form-label fw-semibold">
                            Status
                            <span class="text-danger">*</span>
                        </label>

                        <select name="status"
                            id="status"
                            class="form-select @error('status') is-invalid @enderror"
                            required>

                            <option value="draft"
                                {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                            <option value="published"
                                {{ old('status') === 'published' ? 'selected' : '' }}>
                                Published
                            </option>

                        </select>

                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

                <hr class="my-4">

                {{-- Tombol --}}
                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('admin.berita.index') }}"
                        class="btn btn-light">
                        Batal
                    </a>

                    <button type="submit"
                        class="btn btn-primary px-4">
                        <i class="bi bi-save me-1"></i>
                        Simpan Berita
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
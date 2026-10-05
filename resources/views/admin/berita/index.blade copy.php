@extends('layouts.admin')

@section('title', 'Manajemen Berita')
@section('page-title', 'Manajemen Berita')

@section('content')

<div class="container-fluid px-0">

    {{-- =====================================================
        HEADER
    ====================================================== --}}
    <div class="mb-4">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">

            <div class="d-flex align-items-center gap-3">
                <div class="news-page-icon">
                    <i class="bi bi-newspaper"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-1">Berita Masjid</h3>
                    <p class="text-muted mb-0 small">
                        Kelola berita dan informasi Masjid Al-Barokah
                    </p>
                </div>
            </div>

            <button
                type="button"
                class="btn btn-primary btn-add-news"
                data-bs-toggle="modal"
                data-bs-target="#modalTambahBerita">

                <i class="bi bi-plus-lg me-2"></i>
                Tambah Berita

            </button>

        </div>
    </div>


    {{-- =====================================================
        STATISTIK
    ====================================================== --}}
    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="card news-stat-card h-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <div class="stat-label">Total Berita</div>

                            <div class="stat-number">
                                {{ $totalBerita }}
                            </div>
                        </div>

                        <div class="news-stat-icon total">
                            <i class="bi bi-newspaper"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card news-stat-card h-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <div class="stat-label">Published</div>

                            <div class="stat-number text-success">
                                {{ $totalPublished }}
                            </div>
                        </div>

                        <div class="news-stat-icon published">
                            <i class="bi bi-check-circle"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card news-stat-card h-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <div class="stat-label">Draft</div>

                            <div class="stat-number text-warning">
                                {{ $totalDraft }}
                            </div>
                        </div>

                        <div class="news-stat-icon draft">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>


    {{-- =====================================================
        DAFTAR BERITA
    ====================================================== --}}
    <div class="card news-main-card">

        <div class="card-header bg-white border-0 p-3">

            <div class="row g-3 align-items-center">

                <div class="col-lg-6">

                    <div class="d-flex align-items-center gap-2">

                        <i class="bi bi-list-ul text-primary fs-5"></i>

                        <div>
                            <h6 class="fw-bold mb-0">
                                Daftar Berita
                            </h6>

                            <small class="text-muted">
                                Berita yang tersimpan dalam sistem
                            </small>
                        </div>

                    </div>

                </div>


                <div class="col-lg-6">

                    <form
                        action="{{ route('admin.berita.index') }}"
                        method="GET">

                        <div class="input-group news-search">

                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="form-control"
                                placeholder="Cari berita...">

                            @if(request('search'))

                            <a
                                href="{{ route('admin.berita.index') }}"
                                class="btn btn-light">

                                <i class="bi bi-x-lg"></i>

                            </a>

                            @endif

                            <button
                                type="submit"
                                class="btn btn-primary">

                                Cari

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        {{-- TABLE --}}
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table news-table align-middle mb-0">

                    <thead>

                        <tr>

                            <th class="ps-4">#</th>
                            <th>Berita</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($beritas as $index => $berita)

                        <tr>

                            <td class="ps-4 text-muted">
                                {{ $beritas->firstItem() + $index }}
                            </td>


                            <td>

                                <div class="d-flex align-items-center gap-3">

                                    @if($berita->gambar)

                                    <img
                                        src="{{ asset('storage/' . $berita->gambar) }}"
                                        alt="{{ $berita->judul }}"
                                        class="news-thumbnail">

                                    @else

                                    <div class="news-thumbnail-placeholder">

                                        <i class="bi bi-image"></i>

                                    </div>

                                    @endif


                                    <div class="news-title-wrapper">

                                        <div class="fw-semibold">

                                            {{ Str::limit($berita->judul, 60) }}

                                        </div>

                                        @if($berita->ringkasan)

                                        <small class="text-muted">

                                            {{ Str::limit($berita->ringkasan, 80) }}

                                        </small>

                                        @endif

                                    </div>

                                </div>

                            </td>


                            <td>

                                <div class="d-flex align-items-center gap-2">

                                    <div class="author-icon">
                                        <i class="bi bi-person"></i>
                                    </div>

                                    <small>
                                        {{ $berita->user->name ?? '-' }}
                                    </small>

                                </div>

                            </td>


                            <td>

                                @if($berita->status === 'published')

                                <span class="status-badge published">

                                    <i class="bi bi-check-circle"></i>

                                    Published

                                </span>

                                @else

                                <span class="status-badge draft">

                                    <i class="bi bi-pencil-square"></i>

                                    Draft

                                </span>

                                @endif

                            </td>


                            <td>

                                <small class="text-muted">

                                    <i class="bi bi-calendar3 me-1"></i>

                                    {{ $berita->created_at
                                            ? $berita->created_at->format('d M Y')
                                            : '-' }}

                                </small>

                            </td>


                            <td class="text-center">

                                <div class="action-wrapper">

                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-warning action-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditBerita{{ $berita->id }}"
                                        title="Edit berita">

                                        <i class="bi bi-pencil-square"></i>

                                    </button>


                                    <form
                                        action="{{ route('admin.berita.destroy', $berita) }}"
                                        method="POST"
                                        class="d-inline form-hapus">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger action-btn btn-hapus-berita"
                                            title="Hapus berita">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6" class="text-center py-5">

                                <div class="empty-news">
                                    <i class="bi bi-newspaper"></i>
                                </div>

                                <h6 class="fw-bold mt-3">
                                    Belum ada berita
                                </h6>

                                <p class="text-muted mb-3">
                                    Silakan tambahkan berita pertama.
                                </p>

                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalTambahBerita">

                                    <i class="bi bi-plus-lg me-1"></i>

                                    Tambah Berita

                                </button>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        @if($beritas->hasPages())

        <div class="card-footer bg-white border-0 py-3">

            <div class="d-flex justify-content-center">

                {{ $beritas->withQueryString()->links() }}

            </div>

        </div>

        @endif

    </div>

</div>



{{-- =========================================================
    MODAL EDIT
========================================================= --}}

@foreach($beritas as $berita)

<div
    class="modal fade news-modal"
    id="modalEditBerita{{ $berita->id }}"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">

        <div class="modal-content">


            <div class="modal-header">

                <div class="modal-heading">

                    <div class="modal-icon edit">
                        <i class="bi bi-pencil-square"></i>
                    </div>

                    <div>

                        <h5 class="modal-title fw-bold">
                            Edit Berita
                        </h5>

                        <small>
                            Perbarui informasi berita
                        </small>

                    </div>

                </div>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>


            <form
                action="{{ route('admin.berita.update', $berita) }}"
                method="POST"
                enctype="multipart/form-data"
                novalidate>

                @csrf
                @method('PUT')


                <div class="modal-body">

                    <div class="row g-3">


                        {{-- KIRI --}}
                        <div class="col-lg-8">


                            <div class="mb-3">

                                <label class="form-label">
                                    Judul Berita
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="judul"
                                    class="form-control"
                                    value="{{ old('judul', $berita->judul) }}"
                                    required>

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Ringkasan
                                </label>

                                <textarea
                                    name="ringkasan"
                                    class="form-control"
                                    rows="3"
                                    maxlength="1000"
                                    placeholder="Ringkasan singkat berita...">{{ old('ringkasan', $berita->ringkasan) }}</textarea>

                            </div>


                            <div class="mb-3">

                                <label class="form-label">

                                    Isi Berita

                                    <span class="text-danger">*</span>

                                </label>


                                <div class="editor-wrapper">

                                    <div class="editor-toolbar">

                                        <button type="button" data-command="bold" title="Tebal">
                                            <i class="bi bi-type-bold"></i>
                                        </button>

                                        <button type="button" data-command="italic" title="Miring">
                                            <i class="bi bi-type-italic"></i>
                                        </button>

                                        <button type="button" data-command="underline" title="Garis bawah">
                                            <i class="bi bi-type-underline"></i>
                                        </button>

                                        <button type="button" data-command="insertUnorderedList" title="Bullet">
                                            <i class="bi bi-list-ul"></i>
                                        </button>

                                        <button type="button" data-command="insertOrderedList" title="Numbering">
                                            <i class="bi bi-list-ol"></i>
                                        </button>

                                        <button type="button" data-command="formatBlock" data-value="h3" title="Heading">
                                            <i class="bi bi-type-h3"></i>
                                        </button>

                                        <button type="button" data-command="formatBlock" data-value="blockquote" title="Quote">
                                            <i class="bi bi-blockquote-left"></i>
                                        </button>

                                        <button type="button" data-command="undo" title="Undo">
                                            <i class="bi bi-arrow-counterclockwise"></i>
                                        </button>

                                        <button type="button" data-command="redo" title="Redo">
                                            <i class="bi bi-arrow-clockwise"></i>
                                        </button>

                                    </div>


                                    <div
                                        class="editor-content"
                                        contenteditable="true"
                                        data-placeholder="Tuliskan isi berita...">{!! $berita->isi !!}</div>

                                </div>


                                {{-- JANGAN gunakan required di sini --}}
                                <textarea
                                    name="isi"
                                    class="d-none">{{ $berita->isi }}</textarea>

                            </div>

                        </div>


                        {{-- KANAN --}}
                        <div class="col-lg-4">


                            <div class="modal-panel mb-3">

                                <div class="modal-panel-title">

                                    <i class="bi bi-image"></i>

                                    Gambar Berita

                                </div>


                                <div
                                    id="previewEdit{{ $berita->id }}"
                                    class="image-preview">

                                    @if($berita->gambar)

                                    <img
                                        src="{{ asset('storage/' . $berita->gambar) }}"
                                        alt="{{ $berita->judul }}">

                                    @else

                                    <div class="image-placeholder">

                                        <i class="bi bi-image"></i>

                                        <span>
                                            Belum ada gambar
                                        </span>

                                    </div>

                                    @endif

                                </div>


                                <input
                                    type="file"
                                    name="gambar"
                                    class="form-control form-control-sm input-gambar-edit"
                                    data-preview="previewEdit{{ $berita->id }}"
                                    accept=".jpg,.jpeg,.png,.webp">


                                <small class="text-muted d-block mt-2">
                                    JPG, JPEG, PNG atau WEBP.
                                    Maksimal 2 MB.
                                </small>

                            </div>


                            <div class="modal-panel">

                                <div class="modal-panel-title">

                                    <i class="bi bi-eye"></i>

                                    Status Berita

                                </div>


                                <select
                                    name="status"
                                    class="form-select"
                                    required>

                                    <option
                                        value="draft"
                                        {{ $berita->status === 'draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>

                                    <option
                                        value="published"
                                        {{ $berita->status === 'published' ? 'selected' : '' }}>
                                        Published
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light px-4"
                        data-bs-dismiss="modal">

                        Batal

                    </button>


                    <button
                        type="submit"
                        class="btn btn-warning px-4">

                        <i class="bi bi-check-lg me-1"></i>

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endforeach



{{-- =========================================================
    MODAL TAMBAH
========================================================= --}}

<div
    class="modal fade news-modal"
    id="modalTambahBerita"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">

        <div class="modal-content">


            <div class="modal-header">

                <div class="modal-heading">

                    <div class="modal-icon add">
                        <i class="bi bi-plus-lg"></i>
                    </div>

                    <div>

                        <h5 class="modal-title fw-bold">
                            Tambah Berita
                        </h5>

                        <small>
                            Tambahkan informasi Masjid Al-Barokah
                        </small>

                    </div>

                </div>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>



            <form
                action="{{ route('admin.berita.store') }}"
                method="POST"
                enctype="multipart/form-data"
                novalidate
                id="formTambahBerita">

                @csrf


                <div class="modal-body">

                    <div class="row g-3">


                        {{-- KIRI --}}
                        <div class="col-lg-8">


                            <div class="mb-3">

                                <label class="form-label">

                                    Judul Berita

                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    name="judul"
                                    class="form-control"
                                    placeholder="Masukkan judul berita..."
                                    required>

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Ringkasan
                                </label>

                                <textarea
                                    name="ringkasan"
                                    class="form-control"
                                    rows="3"
                                    maxlength="1000"
                                    placeholder="Ringkasan singkat berita..."></textarea>

                            </div>


                            <div class="mb-3">

                                <label class="form-label">

                                    Isi Berita

                                    <span class="text-danger">*</span>

                                </label>


                                <div class="editor-wrapper">

                                    <div class="editor-toolbar">

                                        <button type="button" data-command="bold" title="Tebal">
                                            <i class="bi bi-type-bold"></i>
                                        </button>

                                        <button type="button" data-command="italic" title="Miring">
                                            <i class="bi bi-type-italic"></i>
                                        </button>

                                        <button type="button" data-command="underline" title="Garis bawah">
                                            <i class="bi bi-type-underline"></i>
                                        </button>

                                        <button type="button" data-command="insertUnorderedList" title="Bullet">
                                            <i class="bi bi-list-ul"></i>
                                        </button>

                                        <button type="button" data-command="insertOrderedList" title="Numbering">
                                            <i class="bi bi-list-ol"></i>
                                        </button>

                                        <button type="button" data-command="formatBlock" data-value="h3" title="Heading">
                                            <i class="bi bi-type-h3"></i>
                                        </button>

                                        <button type="button" data-command="formatBlock" data-value="blockquote" title="Quote">
                                            <i class="bi bi-blockquote-left"></i>
                                        </button>

                                        <button type="button" data-command="undo" title="Undo">
                                            <i class="bi bi-arrow-counterclockwise"></i>
                                        </button>

                                        <button type="button" data-command="redo" title="Redo">
                                            <i class="bi bi-arrow-clockwise"></i>
                                        </button>

                                    </div>


                                    <div
                                        id="editorTambah"
                                        class="editor-content"
                                        contenteditable="true"
                                        data-placeholder="Tuliskan isi berita di sini..."></div>

                                </div>


                                {{-- PENTING: TANPA required --}}
                                <textarea
                                    name="isi"
                                    id="isiTambah"
                                    class="d-none"></textarea>

                            </div>

                        </div>


                        {{-- KANAN --}}
                        <div class="col-lg-4">


                            <div class="modal-panel mb-3">

                                <div class="modal-panel-title">

                                    <i class="bi bi-image"></i>

                                    Gambar Berita

                                </div>


                                <div
                                    id="previewGambar"
                                    class="image-preview">

                                    <div class="image-placeholder">

                                        <i class="bi bi-cloud-arrow-up"></i>

                                        <span>
                                            Preview gambar
                                        </span>

                                    </div>

                                </div>


                                <input
                                    type="file"
                                    name="gambar"
                                    id="gambar"
                                    class="form-control form-control-sm"
                                    accept=".jpg,.jpeg,.png,.webp">


                                <small class="text-muted d-block mt-2">

                                    JPG, JPEG, PNG atau WEBP.
                                    Maksimal 2 MB.

                                </small>

                            </div>


                            <div class="modal-panel">

                                <div class="modal-panel-title">

                                    <i class="bi bi-eye"></i>

                                    Status Berita

                                </div>


                                <select
                                    name="status"
                                    class="form-select"
                                    required>

                                    <option value="draft" selected>
                                        Draft
                                    </option>

                                    <option value="published">
                                        Published
                                    </option>

                                </select>


                                <small class="text-muted d-block mt-2">

                                    Published akan tampil pada website publik.

                                </small>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light px-4"
                        data-bs-dismiss="modal">

                        Batal

                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary px-4">

                        <i class="bi bi-check-lg me-1"></i>

                        Simpan Berita

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>



{{-- =========================================================
    CSS
========================================================= --}}

@push('styles')

<style>
    .news-page-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(13, 110, 253, .10);
        color: #0d6efd;
        font-size: 21px;
    }

    .btn-add-news {
        border-radius: 11px;
        font-weight: 600;
        padding: 10px 18px;
        transition: all .25s ease;
    }

    .btn-add-news:hover {
        transform: translateY(-2px);
    }

    .news-stat-card {
        border: 0;
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
        transition: all .25s ease;
    }

    .news-stat-card:hover {
        transform: translateY(-3px);
    }

    .stat-label {
        color: #6c757d;
        font-size: 13px;
    }

    .stat-number {
        font-size: 28px;
        font-weight: 700;
        margin-top: 3px;
    }

    .news-stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .news-stat-icon.total {
        background: rgba(13, 110, 253, .10);
        color: #0d6efd;
    }

    .news-stat-icon.published {
        background: rgba(25, 135, 84, .10);
        color: #198754;
    }

    .news-stat-icon.draft {
        background: rgba(255, 193, 7, .12);
        color: #b27c00;
    }

    .news-main-card {
        border: 0;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0, 0, 0, .05);
    }

    .news-search {
        border-radius: 11px;
        overflow: hidden;
    }

    .news-search .input-group-text {
        background: #f8f9fa;
        border: 0;
    }

    .news-search .form-control {
        background: #f8f9fa;
        border: 0;
    }

    .news-search .form-control:focus {
        box-shadow: none;
    }

    .news-table {
        font-size: 14px;
    }

    .news-table thead th {
        background: #f8f9fa;
        border-bottom: 1px solid #eee;
        color: #6c757d;
        font-size: 12px;
        font-weight: 700;
        padding-top: 14px;
        padding-bottom: 14px;
    }

    .news-table tbody tr:hover {
        background: rgba(13, 110, 253, .025);
    }

    .news-thumbnail,
    .news-thumbnail-placeholder {
        width: 72px;
        height: 52px;
        border-radius: 10px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .news-thumbnail-placeholder {
        background: #f1f3f5;
        color: #adb5bd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .news-title-wrapper {
        min-width: 180px;
    }

    .author-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: rgba(13, 110, 253, .10);
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 7px 12px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-badge.published {
        background: rgba(25, 135, 84, .10);
        color: #198754;
    }

    .status-badge.draft {
        background: rgba(255, 193, 7, .12);
        color: #a97900;
    }

    .action-wrapper {
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    .action-wrapper form {
        margin: 0;
    }

    .action-btn {
        width: 35px;
        height: 35px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all .2s ease;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    .empty-news {
        width: 70px;
        height: 70px;
        border-radius: 18px;
        background: #f8f9fa;
        color: #adb5bd;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        font-size: 30px;
    }


    /* =====================================================
   MODAL
===================================================== */

    .news-modal .modal-dialog {
        max-width: 820px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .news-modal .modal-content {
        border: 0;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, .18);
    }

    .news-modal .modal-header {
        background: linear-gradient(135deg, #ffffff, #f8f9fa);
        border-bottom: 1px solid #eee;
        padding: 16px 20px;
    }

    .modal-heading {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .modal-heading small {
        color: #6c757d;
        font-size: 12px;
    }

    .modal-icon {
        width: 40px;
        height: 40px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-icon.add {
        background: rgba(13, 110, 253, .10);
        color: #0d6efd;
    }

    .modal-icon.edit {
        background: rgba(255, 193, 7, .15);
        color: #b27c00;
    }

    .news-modal .modal-body {
        padding: 18px 20px;
        max-height: 68vh;
        overflow-y: auto;
    }

    .news-modal .modal-footer {
        background: #fafafa;
        border-top: 1px solid #eee;
        padding: 12px 20px;
    }

    .news-modal .form-label {
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .news-modal .form-control,
    .news-modal .form-select {
        border-radius: 9px;
        border-color: #dee2e6;
        padding: 9px 11px;
        font-size: 14px;
    }

    .news-modal .form-control:focus,
    .news-modal .form-select:focus {
        border-color: rgba(13, 110, 253, .45);
        box-shadow: 0 0 0 .2rem rgba(13, 110, 253, .08);
    }


    /* =====================================================
   EDITOR
===================================================== */

    .editor-wrapper {
        border: 1px solid #dee2e6;
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
    }

    .editor-toolbar {
        display: flex;
        flex-wrap: wrap;
        gap: 4px;
        padding: 7px;
        background: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    .editor-toolbar button {
        width: 36px;
        height: 34px;
        border: 0;
        border-radius: 7px;
        background: transparent;
        color: #495057;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .editor-toolbar button:hover {
        background: #e9ecef;
    }

    .editor-content {
        min-height: 240px;
        max-height: 380px;
        overflow-y: auto;
        padding: 16px;
        outline: none;
        font-size: 16px;
        line-height: 1.8;
        color: #212529;
        background: #ffffff;
    }

    .editor-content:focus {
        box-shadow: inset 0 0 0 2px rgba(13, 110, 253, .08);
    }

    .editor-content:empty::before {
        content: attr(data-placeholder);
        color: #adb5bd;
    }

    .editor-content p {
        margin-bottom: 10px;
    }

    .editor-content h3 {
        font-size: 22px;
        font-weight: 700;
        margin-top: 12px;
        margin-bottom: 12px;
    }

    .editor-content blockquote {
        border-left: 4px solid #0d6efd;
        padding-left: 14px;
        margin: 12px 0;
        color: #6c757d;
    }

    .editor-content ul,
    .editor-content ol {
        padding-left: 28px;
    }


    /* =====================================================
   PANEL
===================================================== */

    .modal-panel {
        background: #f8f9fa;
        border: 1px solid #edf0f2;
        border-radius: 13px;
        padding: 13px;
    }

    .modal-panel-title {
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 9px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .modal-panel-title i {
        color: #0d6efd;
    }


    /* =====================================================
   IMAGE
===================================================== */

    .image-preview {
        width: 100%;
        height: 135px;
        background: #fff;
        border: 1px dashed #d8dde2;
        border-radius: 11px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 9px;
    }

    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #adb5bd;
        gap: 5px;
    }

    .image-placeholder i {
        font-size: 27px;
    }

    .image-placeholder span {
        font-size: 11px;
    }


    /* =====================================================
   MOBILE
===================================================== */

    @media (max-width: 767.98px) {

        .news-modal .modal-dialog {
            margin: 8px;
            max-width: none;
        }

        .news-modal .modal-content {
            border-radius: 15px;
        }

        .news-modal .modal-body {
            padding: 15px;
            max-height: 78vh;
        }

        .news-modal .modal-header {
            padding: 14px 15px;
        }

        .news-modal .modal-footer {
            padding: 11px 15px;
        }

        .news-thumbnail,
        .news-thumbnail-placeholder {
            width: 58px;
            height: 44px;
        }

        .news-title-wrapper {
            min-width: 150px;
        }

        .stat-number {
            font-size: 24px;
        }

        .editor-content {
            min-height: 220px;
            font-size: 16px;
        }

    }
</style>

@endpush



{{-- =========================================================
    JAVASCRIPT
========================================================= --}}

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // =====================================================
        // EDITOR BERITA
        // =====================================================

        document.querySelectorAll('.editor-content').forEach(function(editor) {

            const form = editor.closest('form');

            if (!form) {
                return;
            }

            const textarea = form.querySelector(
                'textarea[name="isi"]'
            );

            if (!textarea) {
                return;
            }

            editor.addEventListener('input', function() {
                textarea.value = editor.innerHTML;
            });

            form.addEventListener('submit', function(event) {

                textarea.value = editor.innerHTML;

                if (editor.innerText.trim() === '') {

                    event.preventDefault();

                    Swal.fire({
                        icon: 'warning',
                        title: 'Isi Berita Belum Diisi',
                        text: 'Silakan tuliskan isi berita terlebih dahulu.',
                        confirmButtonText: 'Perbaiki Data',
                        confirmButtonColor: '#b8860b'
                    }).then(function() {
                        editor.focus();
                    });
                }
            });
        });


        // =====================================================
        // VALIDASI JUDUL
        // =====================================================

        document.querySelectorAll('form').forEach(function(form) {

            const judul = form.querySelector(
                'input[name="judul"]'
            );

            if (!judul) {
                return;
            }

            form.addEventListener('submit', function(event) {

                if (judul.value.trim() === '') {

                    event.preventDefault();

                    Swal.fire({
                        icon: 'warning',
                        title: 'Judul Belum Diisi',
                        text: 'Silakan masukkan judul berita terlebih dahulu.',
                        confirmButtonText: 'Perbaiki Data',
                        confirmButtonColor: '#b8860b'
                    }).then(function() {
                        judul.focus();
                    });
                }

            });

        });

    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.editor-content').forEach(function(editor) {

            const form = editor.closest('form');

            if (!form) {
                return;
            }

            const textarea = form.querySelector('textarea[name="isi"]');

            if (!textarea) {
                return;
            }

            // Sinkronisasi isi editor saat pengguna mengetik
            editor.addEventListener('input', function() {
                textarea.value = editor.innerHTML;
            });

            // Sinkronisasi terakhir sebelum form dikirim
            form.addEventListener('submit', function(event) {

                textarea.value = editor.innerHTML;

                // Periksa apakah editor benar-benar kosong
                const isiText = editor.innerText.trim();

                if (isiText === '') {

                    event.preventDefault();

                    Swal.fire({
                        icon: 'warning',
                        title: 'Isi Berita Belum Diisi',
                        text: 'Silakan tuliskan isi berita terlebih dahulu.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#b8860b'
                    });

                    editor.focus();
                }
            });

        });

    });

    document.addEventListener('DOMContentLoaded', function() {

        /*
        =========================================================
        CEK SWEETALERT
        =========================================================
        */

        if (typeof Swal === 'undefined') {

            console.warn('SweetAlert2 belum dimuat.');

        }


        /*
        =========================================================
        KONFIRMASI HAPUS
        =========================================================
        */

        document.querySelectorAll('.btn-hapus-berita')
            .forEach(function(button) {

                button.addEventListener('click', function(event) {

                    event.preventDefault();

                    const form = button.closest('form');

                    if (!form) {
                        return;
                    }


                    if (typeof Swal === 'undefined') {

                        if (
                            confirm(
                                'Apakah Anda yakin ingin menghapus berita ini?'
                            )
                        ) {
                            form.submit();
                        }

                        return;
                    }


                    Swal.fire({

                        icon: 'warning',

                        title: 'Hapus berita?',

                        text: 'Data yang dihapus tidak dapat dikembalikan.',

                        showCancelButton: true,

                        confirmButtonText: 'Ya, Hapus',

                        cancelButtonText: 'Batal',

                        confirmButtonColor: '#dc3545',

                        cancelButtonColor: '#6c757d',

                        reverseButtons: true,

                        focusCancel: true,

                        allowOutsideClick: false

                    }).then(function(result) {

                        if (result.isConfirmed) {

                            form.submit();

                        }

                    });

                });

            });


        /*
        =========================================================
        EDITOR TOOLBAR
        =========================================================
        */

        document.querySelectorAll('.editor-wrapper')
            .forEach(function(wrapper) {

                const editor =
                    wrapper.querySelector('.editor-content');

                const buttons =
                    wrapper.querySelectorAll(
                        '.editor-toolbar button'
                    );


                if (!editor) {
                    return;
                }


                buttons.forEach(function(button) {

                    button.addEventListener('mousedown', function(event) {

                        /*
                        Mencegah cursor editor kehilangan posisi
                        ketika toolbar diklik.
                        */

                        event.preventDefault();

                    });


                    button.addEventListener('click', function() {

                        const command =
                            button.dataset.command;

                        const value =
                            button.dataset.value || null;


                        editor.focus();


                        try {

                            document.execCommand(
                                command,
                                false,
                                value
                            );

                        } catch (error) {

                            console.warn(
                                'Editor command gagal:',
                                error
                            );

                        }

                    });

                });

            });


        /*
        =========================================================
        TAMBAH BERITA
        =========================================================
        */

        const formTambah =
            document.getElementById('formTambahBerita');

        const editorTambah =
            document.getElementById('editorTambah');

        const isiTambah =
            document.getElementById('isiTambah');


        if (
            formTambah &&
            editorTambah &&
            isiTambah
        ) {

            formTambah.addEventListener('submit', function(event) {

                /*
                Ambil isi HTML dari editor.
                */

                const isi =
                    editorTambah.innerHTML.trim();


                /*
                Bersihkan kondisi editor kosong.
                */

                const teks =
                    editorTambah.innerText
                    .replace(/\u00a0/g, ' ')
                    .trim();


                if (!teks) {

                    event.preventDefault();


                    if (typeof Swal !== 'undefined') {

                        Swal.fire({

                            icon: 'warning',

                            title: 'Isi berita belum diisi',

                            text: 'Silakan tuliskan isi berita terlebih dahulu.',

                            confirmButtonText: 'OK'

                        });

                    } else {

                        alert(
                            'Silakan tuliskan isi berita terlebih dahulu.'
                        );

                    }


                    editorTambah.focus();

                    return;

                }


                /*
                PENTING:
                Isi editor dimasukkan ke textarea sebelum
                form benar-benar dikirim.
                */

                isiTambah.value = isi;


                console.log(
                    'Isi berita siap dikirim:',
                    isiTambah.value
                );

            });

        }


        /*
        =========================================================
        EDIT BERITA
        =========================================================
        */

        document.querySelectorAll('.form-edit-berita')
            .forEach(function(form) {

                form.addEventListener('submit', function(event) {

                    const editor =
                        form.querySelector('.editor-content');

                    const textarea =
                        form.querySelector(
                            'textarea[name="isi"]'
                        );


                    if (!editor || !textarea) {

                        console.error(
                            'Editor atau textarea isi tidak ditemukan.'
                        );

                        return;

                    }


                    const teks =
                        editor.innerText
                        .replace(/\u00a0/g, ' ')
                        .trim();


                    if (!teks) {

                        event.preventDefault();


                        if (typeof Swal !== 'undefined') {

                            Swal.fire({

                                icon: 'warning',

                                title: 'Isi berita belum diisi',

                                text: 'Silakan tuliskan isi berita terlebih dahulu.',

                                confirmButtonText: 'OK'

                            });

                        } else {

                            alert(
                                'Silakan tuliskan isi berita terlebih dahulu.'
                            );

                        }


                        editor.focus();

                        return;

                    }


                    textarea.value =
                        editor.innerHTML.trim();


                    console.log(
                        'Isi edit siap dikirim:',
                        textarea.value
                    );

                });

            });


        /*
        =========================================================
        PREVIEW GAMBAR TAMBAH
        =========================================================
        */

        const gambar =
            document.getElementById('gambar');

        const preview =
            document.getElementById('previewGambar');


        if (gambar && preview) {

            gambar.addEventListener('change', function(event) {

                const file =
                    event.target.files[0];


                if (!file) {
                    return;
                }


                if (file.size > 2 * 1024 * 1024) {

                    Swal.fire({

                        icon: 'error',

                        title: 'Ukuran terlalu besar',

                        text: 'Ukuran gambar maksimal 2 MB.'

                    });


                    gambar.value = '';

                    return;

                }


                const allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];


                if (!allowedTypes.includes(file.type)) {

                    Swal.fire({

                        icon: 'error',

                        title: 'File tidak valid',

                        text: 'Gunakan JPG, JPEG, PNG atau WEBP.'

                    });


                    gambar.value = '';

                    return;

                }


                const reader =
                    new FileReader();


                reader.onload = function(e) {

                    preview.innerHTML = `
                    <img
                        src="${e.target.result}"
                        alt="Preview gambar">
                `;

                };


                reader.readAsDataURL(file);

            });

        }


        /*
        =========================================================
        PREVIEW GAMBAR EDIT
        =========================================================
        */

        document.querySelectorAll('.input-gambar-edit')
            .forEach(function(input) {

                input.addEventListener('change', function(event) {

                    const file =
                        event.target.files[0];


                    if (!file) {
                        return;
                    }


                    if (file.size > 2 * 1024 * 1024) {

                        Swal.fire({

                            icon: 'error',

                            title: 'Ukuran terlalu besar',

                            text: 'Ukuran gambar maksimal 2 MB.'

                        });


                        input.value = '';

                        return;

                    }


                    const allowedTypes = [
                        'image/jpeg',
                        'image/png',
                        'image/webp'
                    ];


                    if (!allowedTypes.includes(file.type)) {

                        Swal.fire({

                            icon: 'error',

                            title: 'File tidak valid',

                            text: 'Gunakan JPG, JPEG, PNG atau WEBP.'

                        });


                        input.value = '';

                        return;

                    }


                    const previewId =
                        input.dataset.preview;


                    const previewElement =
                        document.getElementById(previewId);


                    if (!previewElement) {
                        return;
                    }


                    const reader =
                        new FileReader();


                    reader.onload = function(e) {

                        previewElement.innerHTML = `
                        <img
                            src="${e.target.result}"
                            alt="Preview gambar baru">
                    `;

                    };


                    reader.readAsDataURL(file);

                });

            });


        /*
        =========================================================
        RESET MODAL TAMBAH
        =========================================================
        */

        const modalTambah =
            document.getElementById('modalTambahBerita');


        if (modalTambah) {

            modalTambah.addEventListener(
                'hidden.bs.modal',
                function() {

                    const form =
                        document.getElementById(
                            'formTambahBerita'
                        );

                    const editor =
                        document.getElementById(
                            'editorTambah'
                        );

                    const textarea =
                        document.getElementById(
                            'isiTambah'
                        );

                    const preview =
                        document.getElementById(
                            'previewGambar'
                        );


                    if (form) {
                        form.reset();
                    }


                    if (editor) {
                        editor.innerHTML = '';
                    }


                    if (textarea) {
                        textarea.value = '';
                    }


                    if (preview) {

                        preview.innerHTML = `
                        <div class="image-placeholder">
                            <i class="bi bi-cloud-arrow-up"></i>
                            <span>Preview gambar</span>
                        </div>
                    `;

                    }

                }
            );

        }

    });
</script>

@endpush


@endsection
@extends('layouts.admin')

@section('title', 'Manajemen User - Masjid Al-Barokah')

@section('content')
<div class="container-fluid py-3">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1">Manajemen User</h4>
            <p class="text-muted mb-0">
                Kelola akun dan hak akses pengguna Masjid Al-Barokah.
            </p>
        </div>
    </div>

    {{-- Ringkasan --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Total Pengguna</div>
                    <h3 class="fw-bold mb-0">{{ $totalUser }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Administrator</div>
                    <h3 class="fw-bold text-success mb-0">{{ $totalAdmin }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Pengurus</div>
                    <h3 class="fw-bold text-primary mb-0">{{ $totalPengurus }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Pencarian --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.pengguna.index') }}"
                method="GET"
                class="row g-2 mb-4">

                <div class="col-md-6">
                    <input
                        type="search"
                        name="search"
                        class="form-control"
                        placeholder="Cari nama atau email pengguna..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-auto">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search me-1"></i> Cari
                    </button>
                    <a href="{{ route('admin.pengguna.index') }}"
                        class="btn btn-outline-secondary">
                        Reset
                    </a>
                </div>
            </form>

            {{-- Tabel pengguna --}}
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width:60px">No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role Saat Ini</th>
                            <th>Terdaftar</th>
                            <th style="min-width:260px">Pengaturan Role</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>
                                {{ $users->firstItem() + $loop->index }}
                            </td>

                            <td class="fw-semibold">
                                {{ $user->name }}

                                @if ($user->id === auth()->id())
                                <span class="badge bg-secondary ms-1">
                                    Akun Anda
                                </span>
                                @endif
                            </td>

                            <td>{{ $user->email }}</td>

                            <td>
                                @if ($user->role === 'admin')
                                <span class="badge bg-success">
                                    Administrator
                                </span>
                                @else
                                <span class="badge bg-primary">
                                    Pengurus
                                </span>
                                @endif
                            </td>

                            <td>
                                {{ $user->created_at?->format('d/m/Y') ?? '-' }}
                            </td>

                            <td>
                                @if ($user->id === auth()->id())
                                <span class="text-muted small">
                                    Role akun sendiri dikunci
                                </span>
                                @else
                                <form
                                    action="{{ route('admin.pengguna.updateRole', $user) }}"
                                    method="POST"
                                    class="form-ubah-role d-flex gap-2">

                                    @csrf
                                    @method('PATCH')

                                    <select
                                        name="role"
                                        class="form-select form-select-sm"
                                        aria-label="Role {{ $user->name }}"
                                        required>

                                        <option value="admin"
                                            @selected($user->role === 'admin')>
                                            Admin
                                        </option>

                                        <option value="pengurus"
                                            @selected($user->role === 'pengurus')>
                                            Pengurus
                                        </option>
                                    </select>

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-primary text-nowrap">
                                        <i class="bi bi-shield-check me-1"></i>
                                        Simpan
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="bi bi-people fs-2 text-muted"></i>
                                <p class="text-muted mt-2 mb-0">
                                    Belum ada pengguna yang ditemukan.
                                </p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mt-3">
                <small class="text-muted">
                    Menampilkan {{ $users->firstItem() ?? 0 }}–{{ $users->lastItem() ?? 0 }}
                    dari {{ $users->total() }} pengguna
                </small>

                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.form-ubah-role').forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                const role = form.querySelector('[name="role"]').value;
                const label = role === 'admin' ? 'Admin' : 'Pengurus';

                if (typeof Swal === 'undefined') {
                    if (confirm('Ubah role pengguna menjadi ' + label + '?')) {
                        form.submit();
                    }
                    return;
                }

                Swal.fire({
                    icon: 'question',
                    title: 'Ubah role pengguna?',
                    text: 'Hak akses akan diubah menjadi ' + label + '.',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Ubah Role',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#b8860b',
                    reverseButtons: true
                }).then(function(result) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush
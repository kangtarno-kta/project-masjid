@extends('layouts.admin')

@section('title', 'Manajemen User - Masjid Al-Barokah')

@section('content')
<div class="container-fluid py-4">
    <div class="mb-4">
        <h3 class="fw-bold">Manajemen User</h3>
        <p class="text-muted">
            Daftar pengguna dan pengaturan role akun.
        </p>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-muted">Total Pengguna</div>
                    <h3>{{ $totalUser }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-muted">Administrator</div>
                    <h3 class="text-success">{{ $totalAdmin }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-muted">Pengurus</div>
                    <h3 class="text-primary">{{ $totalPengurus }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form method="GET"
                action="{{ route('admin.pengguna.index') }}"
                class="row g-2 mb-3">
                <div class="col-md-6">
                    <input
                        type="search"
                        name="search"
                        class="form-control"
                        value="{{ request('search') }}"
                        placeholder="Cari nama atau email...">
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

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Terdaftar</th>
                            <th>Pengaturan Role</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $users->firstItem() + $loop->index }}</td>
                            <td>
                                {{ $user->name }}
                                @if ($user->id === auth()->id())
                                <span class="badge bg-secondary">
                                    Akun Anda
                                </span>
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role === 'admin')
                                <span class="badge bg-success">Admin</span>
                                @else
                                <span class="badge bg-primary">
                                    {{ ucfirst($user->role ?? 'pengguna') }}
                                </span>
                                @endif
                            </td>
                            <td>{{ $user->created_at?->format('d/m/Y') ?? '-' }}</td>
                            <td>
                                @if ($user->id === auth()->id())
                                <span class="text-muted">
                                    Akun sendiri
                                </span>
                                @else
                                <form
                                    action="{{ route('admin.pengguna.updateRole', $user) }}"
                                    method="POST"
                                    class="d-flex gap-2">
                                    @csrf
                                    @method('PATCH')

                                    <select
                                        name="role"
                                        class="form-select form-select-sm"
                                        required>
                                        <option value="admin" @selected($user->role === 'admin')>
                                            Admin
                                        </option>

                                        <option value="pengurus" @selected($user->role === 'pengurus')>
                                            Pengurus
                                        </option>

                                        <option value="pengguna" @selected($user->role === 'pengguna')>
                                            Pengguna
                                        </option>
                                    </select>

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-primary">
                                        Simpan
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                Belum ada pengguna.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Selamat Datang</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">

                        <div class="card mb-4">
                            <div class="card-body text-center py-4">
                                <h3 class="fw-bold mb-3 text-dark">Selamat Datang di Dashboard Admin</h3>
                                <p class="mb-4 text-muted">
                                    Hai <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>,<br>
                                    Gunakan menu di <strong>sidebar</strong> untuk mengelola data sistem.
                                </p>
                            </div>
                        </div>

                        <!-- TABEL USER -->
                        <div class="card">
                            <div
                                class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">👥 Manajemen User</h5>
                                <small>{{ $users->count() }} total user</small>
                            </div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle text-center">
                                        <thead class="table-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                <th>Hapus</th>

                                            </tr>
                                        </thead>
                                           <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <form action="{{ route('admin.updateUser', $user->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <td>{{ $user->id }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>

                                                        {{-- Role pindah ke posisi "Status" sebelumnya --}}
                                                        <td>
                                                            <select name="status" class="form-select form-select-sm">
                                                                <option value="user" {{ $user->status == 'user' ? 'selected' : '' }}>User</option>
                                                                <option value="review" {{ $user->status == 'review' ? 'selected' : '' }}>Review</option>
                                                                <option value="admin" {{ $user->status == 'admin' ? 'selected' : '' }}>Admin</option>
                                                            </select>
                                                        </td>

                                                        {{-- Status pindah ke posisi "Role" sebelumnya --}}
                                                        <td>
                                                            <select name="role" class="form-select form-select-sm">
                                                                <option value="active" {{ $user->role == 'active' ? 'selected' : '' }}>Active</option>
                                                                <option value="inactive" {{ $user->role == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                                <option value="suspended" {{ $user->role == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                                            </select>
                                                        </td>

                                                        <td>
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                💾 Simpan
                                                            </button>
                                    
                                                        </td>
                                                    </form>
                                                    <td>
                                                                          <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" class="d-inline"
    onsubmit="return confirm('Yakin ingin menghapus user ini?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" style="margin-left: 5px;">
        🗑️ Hapus
    </button>
</form>
                                                    </td>

                                                    {{-- Tombol Hapus --}}
                                                  
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END TABEL USER -->

                        <p class="text-muted small mt-4 text-center">
                            © {{ date('Y') }} — Sistem Ujian Online | Dibangun dengan <strong>Laravel Breeze</strong>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

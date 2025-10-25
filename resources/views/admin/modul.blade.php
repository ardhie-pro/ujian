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
                            <a href="{{ route('kumpulan-modul.create') }}" class="btn btn-primary">Tambah Kumpulan
                                Modul</a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Start Page-content-Wrapper -->
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="card-body">

                                <h4 class="card-title">Form Kumplan Soal</h4>
                                <p class="card-title-desc">Untuk Mengelompokan Soal</p>

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kumpulan Modul</th>
                                            <th>Modul</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($kumpulan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    @if ($item->modul_ids)
                                                        @foreach ($item->modul_ids as $modul)
                                                            <span class="badge bg-info text-dark">{{ $modul }}</span>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('kumpulan-modul.destroy', $item) }}"
                                                        method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Belum ada kumpulan modul.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                            <!-- End Cardbody -->
                        </div>
                        <!-- End Card-->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->



            </div>
            <!-- End Page-content -->

        </div>
        <!-- Container-Fluid -->
    </div>
@endsection

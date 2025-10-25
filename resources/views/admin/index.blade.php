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
                                        <h4 class="mb-0 font-size-18">Form Tambah Kolom Soal</h4>
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
            <div class="card-body">

                <h4 class="card-title mb-3">Daftar Kolom Soal</h4>

                {{-- Tombol Tambah --}}
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    + Tambah Kolom Soal
                </button>

                {{-- Alert sukses --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Tabel Data --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                @for ($i = 1; $i <= 5; $i++)
                                    <th>Soal {{ $i }}</th>
                                @endfor
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $item->judul }}</td>

                                    @for ($i = 1; $i <= 5; $i++)
                                        <td>
                                            @if ($item["soal{$i}_text"])
                                                <p class="mb-1">{{ $item["soal{$i}_text"] }}</p>
                                            @endif

                                            @if ($item["soal{$i}_img"])
                                                <img src="{{ asset('storage/' . $item["soal{$i}_img"]) }}"
                                                     alt="soal{{ $i }}" class="img-thumbnail" width="80">
                                            @endif
                                        </td>
                                    @endfor

                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-warning btn-edit" data-id="{{ $item->id }}">
    Edit
</button>

                                        <form action="{{ route('kelompok-soal.destroy', $item->id) }}"
                                              method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Belum ada data kolom soal.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- ===================== MODAL TAMBAH ===================== --}}
                <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Kolom Soal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ url('/kelompok-soal') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body" style="max-height: 75vh; overflow-y: auto;">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control">
                    </div>

                    @for ($i = 1; $i <= 5; $i++)
                        <div class="border rounded p-3 mb-3">
                            <h5>Soal {{ $i }}</h5>

                            <div class="mb-2">
                                <label class="form-label">Teks Soal {{ $i }}</label>
                                <textarea name="soal{{ $i }}_text" class="form-control" rows="2"></textarea>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Gambar Soal {{ $i }}</label>
                                <input type="file" name="soal{{ $i }}_img" class="form-control">
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="modal-footer " style="margin-bottom: 10px;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

                {{-- ===================== END MODAL TAMBAH ===================== --}}
                {{-- ===================== MODAL EDIT ===================== --}}
                <<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="modalEditLabel">Edit Kolom Soal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="formEdit" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-body" style="max-height: 75vh; overflow-y: auto;">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" id="edit_judul" class="form-control">
                    </div>

                    @for ($i = 1; $i <= 5; $i++)
                        <div class="border rounded p-3 mb-3">
                            <h5>Soal {{ $i }}</h5>

                            <div class="mb-2">
                                <label class="form-label">Teks Soal {{ $i }}</label>
                                <textarea name="soal{{ $i }}_text" id="edit_soal{{ $i }}_text" class="form-control" rows="2"></textarea>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Gambar Soal {{ $i }}</label>
                                <input type="file" name="soal{{ $i }}_img" class="form-control">
                                <div id="edit_soal{{ $i }}_preview" class="mt-2"></div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="modal-footer" style="margin-bottom: 10px;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
                {{-- ===================== END MODAL EDIT ===================== --}}

            </div>
            <!-- End Cardbody -->
        </div>
        <!-- End Card-->
    </div>
    <!-- End Col -->
</div>
<!-- End Row -->
                            <!-- End Row -->



                        </div>
                        <!-- End Page-content -->

                    </div>
                    <!-- Container-Fluid -->
                </div>
                <script>
                    
document.addEventListener("DOMContentLoaded", function () {
    const modalEdit = new bootstrap.Modal(document.getElementById('modalEdit'));

    // Ketika tombol edit ditekan
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;

            fetch(`/kelompok-soal/${id}/edit`)
                .then(res => res.json())
                .then(data => {
                    // Isi form modal edit dengan data dari server
                    document.getElementById('formEdit').action = `/kelompok-soal/${id}`;
                    document.getElementById('edit_judul').value = data.judul ?? '';

                    for (let i = 1; i <= 5; i++) {
                        document.getElementById(`edit_soal${i}_text`).value = data[`soal${i}_text`] ?? '';

                        const preview = document.getElementById(`edit_soal${i}_preview`);
                        if (data[`soal${i}_img`]) {
                            preview.innerHTML = `<img src="/storage/${data[`soal${i}_img`]}" width="100" class="img-thumbnail">`;
                        } else {
                            preview.innerHTML = '';
                        }
                    }

                    modalEdit.show(); // 🔥 tampilkan modal form edit
                })
                .catch(err => console.error('Gagal ambil data:', err));
        });
    });
});
</script>
@endsection
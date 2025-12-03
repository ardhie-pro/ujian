@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <style>
        body {
            background: #f4f6fb;
            padding: 0;
            font-family: "Inter", Arial, sans-serif;
        }

        .wrapper {
            border: 2px solid #cdd6e4;
            border-radius: 14px;
            padding: 25px;
            background: #fff;
            margin: 40px auto;
            width: 90%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .title {
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 18px;
            background: #F4C542 !important;
            color: #0E2542 !important;
            padding: 8px 14px;
            border-radius: 8px;
            width: max-content;
        }

        /* form edit */
        .edit-box {
            padding: 20px;
            background: #f9fbff;
            border: 1px solid #d8dce5;
            border-radius: 10px;
            margin-top: 15px;
            display: none;
            animation: slide 0.2s ease-out;
        }

        @keyframes slide {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-answered {
            background-color: #244e9b;
            color: white;
        }
    </style>

    <div class="page-content">

        <div class="wrapper card card-animate mt-5">
            <div class="title mb-4">Daftar Grup -----</div>

            <button class="btn btn-answered col-2 mb-5" data-bs-toggle="modal" data-bs-target="#addModal">
                Tambah Grup
            </button>



            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap mt-3">
                <thead>
                    <tr>
                        <th>Nama Grup</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $g)
                        <td>
                            <a href="{{ route('grup.detail', $g->nama_grup) }}">
                                {{ $g->nama_grup }}
                            </a>
                        </td>
                    @endforeach


                    {{-- FORM EDIT TANPA MODAL --}}


                </tbody>
            </table>
        </div>
    </div>

    {{-- SCRIPT UNTUK TOGGLE FORM EDIT --}}
    <script>
        function toggleEdit(id) {
            // sembunyikan semua form edit dulu
            document.querySelectorAll('.edit-box').forEach(el => el.style.display = 'none');

            // toggle hanya yang diklik
            const box = document.getElementById('formEdit' + id);
            box.style.display = (box.style.display === 'none' || box.style.display === '') ? 'block' : 'none';
        }
    </script>


    <!-- MODAL TAMBAH DATA (TETAP ADA) -->
    <div class="modal fade bs-example-modal-lg" id="addModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('grupkolom.generate') }}" method="POST">
                        @csrf
                        <label>Nama Grup:</label>
                        <input type="text" name="nama_grup" class="form-control" required>

                        <label>Jumlah Generate:</label>
                        <input type="number" name="jumlah" class="form-control" required>

                        <label>Waktu (detik):</label>
                        <input type="number" name="waktu" class="form-control" required>

                        <button type="submit" class="btn btn-answered mt-5">Generate</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

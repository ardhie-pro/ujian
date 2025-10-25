@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <br>
    <br>

    <br>

    <br>

    <br>

    <br>

    <br>

    <br>


    <div class="container mt-4">
        <h4 class="mb-3">
            <i class="mdi mdi-key-variant"></i>
            Kunci Jawaban - {{ $modul }} ({{ ucfirst($type_template) }})
        </h4>

        <form action="{{ route('kunci-jawaban.simpan') }}" method="POST">
            @csrf

            {{-- Modul otomatis --}}
            <input type="hidden" name="modul_jawaban" value="{{ $modul }}">

            <table class="table table-bordered align-middle">
                <thead class="table-primary">
                    <tr>
                        <th width="5%">No</th>
                        <th>Soal</th>
                        <th width="20%">Kunci Jawaban</th>
                        <th width="15%">Poin Jawaban</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->no }}</td>
                            <td>{{ $row->soal }}</td>
                            <td>
                                <select class="form-select form-select-sm" name="jawaban_benar[{{ $row->no }}]">
                                    <option value="">Pilih</option>
                                    @foreach (['A', 'B', 'C', 'D', 'E'] as $opsi)
                                        <option value="{{ $opsi }}"
                                            {{ isset($kunci[$row->no]) && $kunci[$row->no]->jawaban_benar == $opsi ? 'selected' : '' }}>
                                            {{ $opsi }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm"
                                    name="poin_jawaban[{{ $row->no }}]" value="{{ $existingPoin[$row->no] ?? '' }}"
                                    placeholder="cth: 10">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <button type="submit" class="btn btn-success" style="margin-bottom: 100px">
                <i class="mdi mdi-content-save-outline"></i> Simpan Kunci Jawaban
            </button>

        </form>


    </div>
@endsection

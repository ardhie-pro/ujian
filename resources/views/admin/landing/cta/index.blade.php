@extends('layouts.main')

@section('title', 'Landing Page CTA')

@section('content')
<style>
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
</style>

<div class="page-content">
    <div class="wrapper card mt-5">
        <div class="title mb-4">Pengaturan Header Section CTA</div>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('landing-cta.section.update') }}" method="POST" class="mb-5">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label>Judul CTA</label>
                        <input type="text" name="title" class="form-control" value="{{ $section->title ?? 'Semua Mendukung Perangkat Anda' }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Deskripsi CTA (Mendukung HTML)</label>
                        <textarea name="description" class="form-control" rows="3">{{ $section->description ?? '' }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Update Teks CTA</button>
                </div>
            </div>
        </form>

        <hr class="my-5">

        <div class="title mb-4">Tambah Tombol Platform Baru</div>
        <form action="{{ route('landing-cta.button.store') }}" method="POST" class="mb-5 border p-3 rounded">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Label</label>
                        <input type="text" name="label" class="form-control" placeholder="Iphone" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Icon (Themify)</label>
                        <input type="text" name="icon" class="form-control" placeholder="ti-apple" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" name="link" class="form-control" placeholder="#">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Order</label>
                        <input type="number" name="order" class="form-control" value="0">
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="is_active" class="custom-control-input" id="isActiveAdd" checked>
                        <label class="custom-control-label" for="isActiveAdd">Aktif</label>
                    </div>
                    <button type="submit" class="btn btn-success mt-3 w-100">Tambah Tombol</button>
                </div>
            </div>
        </form>

        <div class="title mb-3">Daftar Tombol Platform</div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Icon</th>
                        <th>Label</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($buttons as $button)
                        <tr>
                            <td>{{ $button->order }}</td>
                            <td><i class="{{ $button->icon }} fa-2x"></i></td>
                            <td>{{ $button->label }}</td>
                            <td>
                                <span class="badge {{ $button->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $button->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('landing-cta.button.edit', $button->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                <form action="{{ route('landing-cta.button.destroy', $button->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus tombol ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada tombol.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

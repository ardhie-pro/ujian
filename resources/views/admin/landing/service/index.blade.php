@extends('layouts.main')

@section('title', 'Landing Page Services')

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
    .card-animate {
        opacity: 0;
        transform: translateY(30px);
        animation: slideUp 1s ease-out forwards;
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="page-content">
    <div class="wrapper card card-animate mt-5">
        <div class="title mb-4">Pengaturan Header Section Layanan</div>
        
        <form action="{{ route('landing-service.section.update') }}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group mb-3">
                        <label>Judul Section</label>
                        <input type="text" name="title" class="form-control" value="{{ $section->title ?? 'An Interface For Lifestyle' }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Deskripsi Section</label>
                        <textarea name="description" class="form-control" rows="3">{{ $section->description ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label>Gambar Samping (Phone/App Image)</label>
                        @if(isset($section->image))
                            <div class="mb-2">
                                <img src="{{ asset($section->image) }}" alt="section image" style="height: 100px;" class="img-thumbnail">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Update Header & Gambar</button>
                </div>
            </div>
        </form>

        <hr class="my-5">

        <div class="d-flex justify-content-between align-items-center mb-5">
            <div class="title mb-0">List Item Layanan (Card)</div>
            <a href="{{ route('landing-service.create') }}" class="btn btn-primary">+ Tambah Service</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>{{ $service->order }}</td>
                            <td><i class="{{ $service->icon }} fa-2x"></i> ({{ $service->icon }})</td>
                            <td>{{ $service->title }}</td>
                            <td>
                                <span class="badge {{ $service->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $service->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('landing-service.edit', $service->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                <form action="{{ route('landing-service.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus service ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data service.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

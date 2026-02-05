@extends('layouts.main')

@section('title', 'Landing Page Features')

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
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div class="title mb-0">List Fitur Landing Page</div>
            <a href="{{ route('landing-feature.create') }}" class="btn btn-primary">+ Tambah Fitur</a>
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
                        <th>Title</th>
                        <th>Layout</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($features as $feature)
                        <tr>
                            <td>{{ $feature->order }}</td>
                            <td>{{ $feature->title }}</td>
                            <td>{{ $feature->layout }}</td>
                            <td>
                                <span class="badge {{ $feature->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $feature->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('landing-feature.edit', $feature->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                <form action="{{ route('landing-feature.destroy', $feature->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus fitur ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data fitur.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

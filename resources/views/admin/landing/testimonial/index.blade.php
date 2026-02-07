@extends('layouts.main')

@section('title', 'Landing Page Testimonials')

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
        <div class="title mb-4">Pengaturan Testimonial Landing Page</div>
        <p class="text-muted">Daftar testimonial yang masuk dari user maupun admin. Status <b>Active</b> akan tampil di landing page.</p>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive mt-4">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Perusahaan</th>
                        <th>Pesan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonial->order }}</td>
                            <td>
                                @if($testimonial->photo)
                                    <img src="{{ asset($testimonial->photo) }}" alt="photo" style="width: 50px; height: 50px; object-fit: cover;" class="rounded-circle">
                                @else
                                    <span class="text-muted">No Photo</span>
                                @endif
                            </td>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->company }}</td>
                            <td><small>{{ Str::limit($testimonial->message, 100) }}</small></td>
                            <td>
                                <span class="badge {{ $testimonial->is_active ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ $testimonial->is_active ? 'Active' : 'Pending' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('landing-testimonial.edit', $testimonial->id) }}" class="btn btn-sm btn-warning text-white">Edit / Activate</a>
                                <form action="{{ route('landing-testimonial.destroy', $testimonial->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus testimonial ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada testimonial.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

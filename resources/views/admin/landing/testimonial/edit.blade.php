@extends('layouts.main')

@section('title', 'Edit Testimonial')

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
        <div class="title mb-5">Edit & Review Testimonial</div>

        <form action="{{ route('landing-testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Jabatan / Perusahaan</label>
                        <input type="text" name="company" class="form-control" value="{{ $testimonial->company }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label>Pesan / Testimonial</label>
                        <textarea name="message" class="form-control" rows="5" required>{{ $testimonial->message }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Foto Profil</label>
                        @if($testimonial->photo)
                            <div class="mb-2">
                                <img src="{{ asset($testimonial->photo) }}" alt="photo" style="width: 100px;" class="img-thumbnail">
                            </div>
                        @endif
                        <input type="file" name="photo" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Order</label>
                        <input type="number" name="order" class="form-control" value="{{ $testimonial->order }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="custom-control custom-switch mb-4">
                        <input type="checkbox" name="is_active" class="custom-control-input" id="isActiveEdit" {{ $testimonial->is_active ? 'checked' : '' }}>
                        <label class="custom-control-label" for="isActiveEdit">Tampilkan di Landing Page (Aktifkan)</label>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('landing-testimonial.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

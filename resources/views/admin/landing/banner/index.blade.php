@extends('layouts.main')

@section('title', 'Banner Utama')

@section('content')
<style>
    body {
        background: #f4f6fb;
        padding: 0;
        font-family: "Inter", Arial, sans-serif;
    }

    h1 {
        text-align: center;
        font-size: 36px;
        font-weight: 800;
        color: #222;
        margin: 0;
    }

    h2 {
        color: #4b4b4b;
        text-align: center;
        margin-top: 6px;
        font-weight: 400;
        letter-spacing: 0.5px;
    }

    /* WRAPPER */
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

    /* CARD */
    .card {
        background: #ffffff;
        border-radius: 14px;
        padding: 22px;
        border: 1px solid #dde3ee;
        box-shadow:
            0 3px 6px rgba(0, 0, 0, 0.05),
            0 1px 2px rgba(0, 0, 0, 0.04);
        transition: 0.25s ease;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow:
            0 10px 25px rgba(0, 0, 0, 0.14),
            0 4px 10px rgba(0, 0, 0, 0.08);
        border-color: #b8c6df;
    }

    .card-animate {
        opacity: 0;
        transform: translateY(30px);
        animation: slideUp 1.6s ease-out forwards;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="page-content">
    <div class="wrapper card card-animate mt-5">
        <div class="title mb-5">Edit Banner Landing Page</div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('landing-banner.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" name="title" class="form-control" value="{{ $banner->title ?? '' }}">
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="description" class="form-control" style="height: 100px;">{{ $banner->description ?? '' }}</textarea>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Text</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" name="button_text" class="form-control" value="{{ $banner->button_text ?? 'Download Now' }}">
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Link</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" name="button_link" class="form-control" value="{{ $banner->button_link ?? '#' }}">
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Image</label>
                <div class="col-sm-12 col-md-7">
                    @if(isset($banner->image))
                        <div class="mb-2">
                            <img src="{{ asset($banner->image) }}" alt="Current Banner" style="max-width: 200px; border-radius: 5px;">
                        </div>
                    @endif
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <small class="form-text text-muted">Abaikan jika tidak ingin mengubah gambar.</small>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                    <label class="custom-switch mt-2">
                        <input type="checkbox" name="is_active" class="custom-switch-input" {{ ($banner->is_active ?? true) ? 'checked' : '' }}>
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Active</span>
                    </label>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    <button class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

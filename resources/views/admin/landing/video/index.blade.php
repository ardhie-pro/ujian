@extends('layouts.main')

@section('title', 'Landing Page Video Promo')

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
        <div class="title mb-5">Pengaturan Video Promo Landing Page</div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('landing-video.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group mb-4">
                        <label>Judul (Heading)</label>
                        <input type="text" name="title" class="form-control" value="{{ $video->title ?? 'Watch Our Promo Video' }}" required>
                    </div>

                    <div class="form-group mb-4">
                        <label>Deskripsi (Promotional Speech)</label>
                        <textarea name="description" class="form-control" style="height: 120px;">{{ $video->description ?? '' }}</textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label>Video URL (YouTube/Fancybox compatible)</label>
                        <input type="text" name="video_url" class="form-control" value="{{ $video->video_url ?? 'https://www.youtube.com/watch?v=jrkvirglgaQ' }}" placeholder="https://www.youtube.com/watch?v=...">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <label>Background Image</label>
                        @if(isset($video->background_image))
                            <div class="mb-2">
                                <img src="{{ asset($video->background_image) }}" alt="background promo" class="img-fluid rounded border shadow-sm">
                            </div>
                        @endif
                        <input type="file" name="background_image" class="form-control">
                        <small class="text-muted d-block mt-1">Gunakan gambar resolusi tinggi (rekomendasi: 1920x1080px)</small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

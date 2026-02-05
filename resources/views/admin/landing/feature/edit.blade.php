@extends('layouts.main')

@section('title', 'Edit Fitur')

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
        <div class="title mb-5">Edit Fitur</div>

        <form action="{{ route('landing-feature.update', $landing_feature->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group mb-4">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $landing_feature->title }}" required>
                    </div>

                    <div class="form-group mb-4">
                        <label>Description</label>
                        <textarea name="description" class="form-control" style="height: 100px;">{{ $landing_feature->description }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label>Layout</label>
                                <select name="layout" class="form-control">
                                    <option value="image_left" {{ $landing_feature->layout == 'image_left' ? 'selected' : '' }}>Image Left</option>
                                    <option value="image_right" {{ $landing_feature->layout == 'image_right' ? 'selected' : '' }}>Image Right</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label>Order</label>
                                <input type="number" name="order" class="form-control" value="{{ $landing_feature->order }}">
                            </div>
                        </div>
                    </div>

                    <div class="border p-3 rounded mb-4">
                        <h5>Testimonial Content</h5>
                        <div class="form-group mb-3">
                            <label>Quote</label>
                            <textarea name="testimonial_quote" class="form-control">{{ $landing_feature->testimonial_quote }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Author Name</label>
                            <input type="text" name="testimonial_author" class="form-control" value="{{ $landing_feature->testimonial_author }}">
                        </div>
                        <div class="form-group">
                            <label>Author Image</label>
                            @if($landing_feature->testimonial_author_image)
                                <img src="{{ asset($landing_feature->testimonial_author_image) }}" class="d-block mb-2 rounded-circle" width="50">
                            @endif
                            <input type="file" name="testimonial_author_image" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <label>Main Feature Image</label>
                        @if($landing_feature->image)
                            <img src="{{ asset($landing_feature->image) }}" class="img-fluid mb-2 rounded border" width="200">
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group mb-4">
                        <label>Status</label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="is_active" class="custom-control-input" id="isActive" {{ $landing_feature->is_active ? 'checked' : '' }}>
                            <label class="custom-control-label" for="isActive">Active</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('landing-feature.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

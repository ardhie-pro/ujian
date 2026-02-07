@extends('layouts.main')

@section('title', 'Edit Service')

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
        <div class="title mb-5">Edit Service Card</div>

        <form action="{{ route('landing-service.update', $landing_service->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group mb-4">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $landing_service->title }}" required>
                    </div>

                    <div class="form-group mb-4">
                        <label>Description</label>
                        <textarea name="description" class="form-control" style="height: 100px;">{{ $landing_service->description }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label>Icon (Themify Icon Class)</label>
                                <input type="text" name="icon" class="form-control" value="{{ $landing_service->icon }}" required>
                                <small class="text-muted">Gunakan class dari <a href="https://themify.me/themify-icons" target="_blank">Themify Icons</a></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label>Order</label>
                                <input type="number" name="order" class="form-control" value="{{ $landing_service->order }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label>Link (Opsional)</label>
                        <input type="text" name="link" class="form-control" value="{{ $landing_service->link }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <label>Status</label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="is_active" class="custom-control-input" id="isActive" {{ $landing_service->is_active ? 'checked' : '' }}>
                            <label class="custom-control-label" for="isActive">Active</label>
                        </div>
                    </div>
                    
                    <div class="card bg-light p-3 mt-4">
                        <h5>Icon Preview</h5>
                        <div class="text-center p-4">
                            <i class="{{ $landing_service->icon }} fa-4x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('landing-service.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update Service</button>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.main')

@section('title', 'Edit Tombol CTA')

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
        <div class="title mb-5">Edit Tombol CTA</div>

        <form action="{{ route('landing-cta.button.update', $button->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Label</label>
                        <input type="text" name="label" class="form-control" value="{{ $button->label }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Icon (Themify)</label>
                        <input type="text" name="icon" class="form-control" value="{{ $button->icon }}" required>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group mb-3">
                        <label>Link</label>
                        <input type="text" name="link" class="form-control" value="{{ $button->link }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label>Order</label>
                        <input type="number" name="order" class="form-control" value="{{ $button->order }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="custom-control custom-switch mb-4">
                        <input type="checkbox" name="is_active" class="custom-control-input" id="isActiveEdit" {{ $button->is_active ? 'checked' : '' }}>
                        <label class="custom-control-label" for="isActiveEdit">Aktif</label>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('landing-cta.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update Tombol</button>
            </div>
        </form>
    </div>
</div>
@endsection

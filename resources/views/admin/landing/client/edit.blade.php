@extends('layouts.main')

@section('title', 'Edit Client')

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
        <div class="title mb-5">Edit Client</div>

        <form action="{{ route('landing-client.update', $landing_client->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group mb-4">
                        <label>Nama Client (Opsional)</label>
                        <input type="text" name="name" class="form-control" value="{{ $landing_client->name }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label>Order (Urutan)</label>
                                <input type="number" name="order" class="form-control" value="{{ $landing_client->order }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label>Status</label>
                                <div class="custom-control custom-switch mt-2">
                                    <input type="checkbox" name="is_active" class="custom-control-input" id="isActive" {{ $landing_client->is_active ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="isActive">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <label>Logo Client</label>
                        @if($landing_client->logo)
                            <img src="{{ asset($landing_client->logo) }}" class="img-fluid d-block mb-2 rounded border p-2" width="150">
                        @endif
                        <input type="file" name="logo" class="form-control">
                        <small class="text-muted">Abaikan jika tidak ingin mengubah logo.</small>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('landing-client.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
